import axios from "axios";
import { execSync } from "child_process";
import fs from "fs";
import path from "path";

interface Config {
    apiUrl: string;
    model: string;
    temperature: number;
    maxTokens: number;
    stream: boolean;
    apiKey: string;
}

function loadConfig(filePath: string): Config {
    try {
        const fileContents = fs.readFileSync(filePath, "utf8");
        return JSON.parse(fileContents) as Config;
    } catch (error) {
        console.error(`Error loading configuration file: ${error.message}`);
        process.exit(1);
    }
}

function getGitChanges(): string | null {
    try {
        // Get the diff of staged changes
        const stagedChanges = execSync("git diff --cached", {
            encoding: "utf8",
        }).trim();
        // Get the diff of unstaged changes
        const unstagedChanges = execSync("git diff", {
            encoding: "utf8",
        }).trim();

        // Determine which changes to include
        if (stagedChanges) {
            return stagedChanges; // Only staged changes
        } else if (unstagedChanges) {
            return unstagedChanges; // Only unstaged changes
        }

        return null; // No changes
    } catch (error) {
        console.error(`Error fetching git changes: ${error.message}`);
        return null;
    }
}

function generateCommitMessage(changes: string): string {
    // Improved description extraction
    const description = changes.slice(0, 2000).replace(/\s+/g, " ").trim();

    let commitType = "chore"; // Default type
    let commitScope = "general"; // Default scope

    if (description.match(/fix|bug|issue/)) {
        commitType = "fix";
    } else if (description.match(/add|implement|feature/)) {
        commitType = "feat";
    }

    if (description.match(/views|frontend/)) {
        commitScope = "views";
    } else if (description.match(/backend|api/)) {
        commitScope = "backend";
    } else if (description.match(/docs/)) {
        commitScope = "docs";
    }

    return `${commitType}(${commitScope}): ${description}`;
}

async function sendCommitMessage(commitMessage: string, config: Config) {
    if (!config.apiKey) {
        console.error("API key is missing. Cannot send commit message.");
        return;
    }

    const prompt = `Generate a commit message in the Conventional Commits format based on the following changes:\n\n${commitMessage}\n\nPlease provide only the commit message without any additional text.`;

    const payload = {
        model: config.model,
        messages: [{ role: "system", content: prompt }],
        temperature: config.temperature,
        max_tokens: config.maxTokens,
        stream: config.stream,
    };

    try {
        const response = await axios.post(config.apiUrl, payload, {
            headers: {
                Authorization: `Bearer ${config.apiKey}`,
                "Content-Type": "application/json",
            },
        });

        // Extract only the commit message from the response
        const message = response.data.choices[0].message.content.trim();

        console.log(message);
    } catch (error) {
        console.error(`Error sending commit message: ${error.message}`);
    }
}

function main() {
    const config = loadConfig(path.resolve(__dirname, "cmg_config.json"));
    const changes = getGitChanges();

    if (changes) {
        const commitMessage = generateCommitMessage(changes);
        sendCommitMessage(commitMessage, config);
    } else {
        console.log("No changes found.");
    }
}

main();
