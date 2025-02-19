@extends('layouts.frontend.app')
@section('canonical')
  <link rel="canonical" href="https://www.schooldekho.org/terms" />
@endsection
@push('css')
@endpush
@section('content')
	<style>
		.section-padding-02 {
			margin-top: 0 !important;
		}

		.h-margin {
			margin-top: 65px;
		}
    .course-curriculum__lesson {
      display: grid !important;
    }
	</style>
	<div class="tutor-course-main-content section-padding-01 sticky-parent">
		<div class="custom-container container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Tutor Course Main Segment Start -->
					<div class="tutor-course-main-segment">
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment">
							<div
								style="
                      transform: translate3d(0px, 0px, 0px);
                      transform-style: preserve-3d;
                      backface-visibility: hidden;
                      position: relative;
                      display: block;
                      left: 0px;
                      top: 0px;
                    ">
								<!-- Page Breadcrumb Start -->
								<div class="page-breadcrumb">
									<div class="container" style="padding-left: unset">
										<ul class="breadcrumb">
											<li class="breadcrumb-item"><a href="index-main.html">Home</a></li>
											<li class="breadcrumb-item active">Terms & Conditions</li>
										</ul>
									</div>
								</div>
								<!-- Page Breadcrumb End -->
								<!-- Instructor Banner Start -->
								<div class="instructor-banner">
									<div class="custom-container container" style="padding-left: unset">
										<div class="row align-items-end align-items-xl-center">
											<div class="col-lg-6">
												<!-- Instructor Banner Start -->
												<div class="instructor-banner__content aos-init aos-animate"
													data-aos="fade-up" data-aos-duration="1000">
													<!-- Section Title Start -->
													<div class="section-title">
														<h2 class="section-title__title-03">Terms & Conditions</h2>
													</div>
													<!-- Section Title End -->
												</div>
												<!-- Instructor Banner End -->
											</div>
										</div>
									</div>
								</div>
								<!-- Instructor Banner End -->
							</div>
							<!-- Tutor Course Segment Content Wrapper Start -->
							<div class="tutor-course-segment__content-wrap">
								<p style="text-align: justify;">
									These Terms of Use constitute a legally binding agreement made between
									you, whether
									personally
									or
									on behalf of an entity (“you”) and School Dekho, doing business as
									School Dekho (<b style="font-weight: bold">"School
										Dekho",
										“we”, “us”, or “our”</b>), concerning your access to and use of the
									<a href="/">schooldekho.org</a> website as well as any other media
									form, media
									channel, mobile website or mobile application related, linked, or
									otherwise connected
									thereto
									(collectively, the “Site”). You agree that by accessing the Site, you
									have read,
									understood, and
									agreed to be bound by all of these Terms of Use. IF YOU DO NOT AGREE
									WITH ALL OF THESE
									TERMS OF
									USE, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST
									DISCONTINUE USE
									IMMEDIATELY.
								</p>
								<p style="text-align: justify;">
									Supplemental terms and conditions or documents that may be posted on the
									Site from time
									to time
									are hereby expressly incorporated herein by reference. We reserve the
									right, in our sole
									discretion, to make changes or modifications to these Terms of Use at
									any time and for
									any
									reason. We will alert you about any changes by updating the “Last
									updated” date of these
									Terms
									of Use, and you waive any right to receive specific notice of each such
									change. It is
									your
									responsibility to periodically review these Terms of Use to stay
									informed of updates.
									You will
									be subject to, and will be deemed to have been made aware of and to have
									accepted, the
									changes
									in any revised Terms of Use by your continued use of the Site after the
									date such
									revised Terms
									of Use are posted.
								</p>
								<p style="text-align: justify;">
									The information provided on the Site is not intended for distribution to
									or use by any
									person or
									entity in any jurisdiction or country where such distribution or use
									would be contrary
									to law or
									regulation or which would subject us to any registration requirement
									within such
									jurisdiction or
									country. Accordingly, those persons who choose to access the Site from
									other locations
									do so on
									their own initiative and are solely responsible for compliance with
									local laws, if and
									to the
									extent local laws are applicable.
								</p>
								<p style="text-align: justify;">
									All users who are minors in the jurisdiction in which they reside
									(generally under the
									age of
									18) must have the permission of, and be directly supervised by, their
									parent or guardian
									to use
									the Site. If you are a minor, you must have your parent or guardian read
									and agree to
									these
									Terms of Use prior to you using the Site.
								</p>
							</div>
							<!-- Tutor Course Segment Content Wrapper End -->
						</div>
						<!-- Tutor Course Segment End -->
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment"></div>
						<!-- Tutor Course Segment End -->
						<!-- Tutor Course Segment Start -->
						<div class="tutor-course-segment">
							<div class="course-curriculum accordion">
								<?php
                  $accordionItems = [
                    [
                      'title' => 'INTELLECTUAL PROPERTY RIGHTS',
                      'content' =>
                      '<p style="text-align: justify"> Unless otherwise indicated, the Site is our proprietary property and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the “Content”) and the trademarks, service marks, and logos contained therein (the “Marks”) are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of the United States, international copyright laws, and international conventions. The Content and the Marks are provided on the Site “AS IS” for your information and personal use only. Except as expressly provided in these Terms of Use, no part of the Site and no Content or Marks may be copied, reproduced, aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, distributed, sold, licensed, or otherwise exploited for any commercial purpose whatsoever, without our express prior written permission. <br><br> Unless otherwise indicated, the Site is our proprietary property and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the “Content”) and the trademarks, service marks, and logos contained therein (the “Marks”) used on this website of third parties and/or schools, which are collected from the public domain and are available under the fair usage policy that are published on the website are strictly for information and/or identification purposes only and are not the intellectual property of the Company. All the data mining activities i.e. scrapping, crawling and republishing is not allowed until and unless written permission is obtained from the company. The content downloaded from the website does not pass on the rights or title to use it for commercial use. </p>'
                    ],
                    [
                      'title' => 'USER REPRESENTATIONS',
                      'content' => '<p style="text-align: justify">
                                        <i> By using the Site, you represent and warrant that:</i> <br><br>
                                        (1) all registration information you submit will be true, accurate, current, and
                                        complete; <br>
                                        (2) you will maintain the accuracy of such information and promptly update such
                                        registration information as necessary; <br>
                                        (3) you have the legal capacity and you agree to comply with these Terms of Use;
                                        <br>
                                        (4) you are not a minor in the jurisdiction in which you reside, or if a minor, you
                                        have received parental permission to use the Site; <br>
                                        (5) you will not access the Site through automated or non-human means, whether
                                        through a bot, script, or otherwise; <br>
                                        (6) you will not use the Site for any illegal or unauthorized purpose; and <br>
                                        (7) your use of the Site will not violate any applicable law or regulation.
                                        <br> <br>
                                        If you provide any information that is untrue, inaccurate, not current, or
                                        incomplete, we have the right to suspend or terminate your account and refuse any
                                        and all current or future use of the Site (or any portion thereof).
                                    </p>'
                    ],
                    [
                      'title' => 'USER REGISTRATION',
                      'content' => '<p style="text-align: justify">
                                       You may be required to register with the Site. You agree to keep your password confidential and will be responsible for all use of your account and password. We reserve the right to remove, reclaim, or change a username you select if we determine, in our sole discretion, that such username is inappropriate, obscene, or otherwise objectionable.
                                    </p>'
                    ],
                    [
                      'title' => 'PROHIBITED ACTIVITIES',
                      'content' => '<p style="text-align:justify;">
                                        You may not access or use the Site for any purpose other than that for which we make
                                        the Site available. The Site may not be used in connection with any commercial
                                        endeavors except those that are specifically endorsed or approved by us.
                                        <br><br>
                                        <i>As a user of the Site, you agree not to:</i>
                                        <br><br>
                                        <b style="font-weight: bold">USER GENERATED CONTRIBUTIONS</b>
                                        <br><br>
                                        The Site may invite you to chat, contribute to, or participate in blogs, message
                                        boards, online forums, and other functionality, and may provide you with the
                                        opportunity to create, submit, post, display, transmit, perform, publish,
                                        distribute, or broadcast content and materials to us or on the Site, including but
                                        not limited to text, writings, video, audio, photographs, graphics, comments,
                                        suggestions, or personal information or other material (collectively,
                                        "Contributions"). Contributions may be viewable by other users of the Site and
                                        through third-party websites. As such, any Contributions you transmit may be treated
                                        as non-confidential and non-proprietary. When you create or make available any
                                        Contributions, you thereby represent and warrant that:
                                        <br>1. The creation, distribution, transmission, public display, or performance,
                                        and the accessing, downloading, or copying of your Contributions do not and will not
                                        infringe the proprietary rights, including but not limited to the copyright, patent,
                                        trademark, trade secret, or moral rights of any third party.
                                        <br>2. You are the creator and owner of or have the necessary licenses, rights,
                                        consents, releases, and permissions to use and to authorize us, the Site, and other
                                        users of the Site to use your Contributions in any manner contemplated by the Site
                                        and these Terms of Use.
                                        <br>3. You have the written consent, release, and/or permission of each and every
                                        identifiable individual person in your Contributions to use the name or likeness of
                                        each and every such identifiable individual person to enable inclusion and use of
                                        your Contributions in any manner contemplated by the Site and these Terms of Use.
                                        <br>4. Your Contributions are not false, inaccurate, or misleading.
                                        <br>5. Your Contributions are not unsolicited or unauthorized advertising,
                                        promotional materials, pyramid schemes, chain letters, spam, mass mailings, or other
                                        forms of solicitation.
                                        <br>6. Your Contributions are not obscene, lewd, lascivious, filthy, violent,
                                        harassing, libelous, slanderous, or otherwise objectionable (as determined by us).
                                        <br>7. Your Contributions do not ridicule, mock, disparage, intimidate, or abuse
                                        anyone.
                                        <br>8. Your Contributions are not used to harass or threaten (in the legal sense
                                        of those terms) any other person and to promote violence against a specific person
                                        or class of people.
                                        <br>9. Your Contributions do not violate any applicable law, regulation, or rule.
                                        <br>10. Your Contributions do not violate the privacy or publicity rights of any
                                        third party.
                                        <br>11. Your Contributions do not contain any material that solicits personal
                                        information from anyone under the age of 18 or exploits people under the age of 18
                                        in a sexual or violent manner.
                                        <br>12. Your Contributions do not violate any applicable law concerning child
                                        pornography, or otherwise intended to protect the health or well-being of minors.
                                        <br>13. Your Contributions do not include any offensive comments that are
                                        connected to race, national origin, gender, sexual preference, or physical handicap.
                                        <br>14. Your Contributions do not otherwise violate, or link to material that
                                        violates, any provision of these Terms of Use, or any applicable law or regulation.
                                        Any use of the Site in violation of the foregoing violates these Terms of Use and
                                        may result in, among other things, termination or suspension of your rights to use
                                        the Site.
                                    </p>'
                    ],
                    [
                      'title' => 'CONTRIBUTION LICENSE',
                      'content' => '<p style="text-align:justify;">
                                        By posting your Contributions to any part of the Site or making Contributions
                                        accessible to the Site by linking your account from the Site to any of your social
                                        networking accounts, you automatically grant, and you represent and warrant that you
                                        have the right to grant, to us an unrestricted, unlimited, irrevocable, perpetual,
                                        non-exclusive, transferable, royalty-free, fully-paid, worldwide right, and license
                                        to host, use, copy, reproduce, disclose, sell, resell, publish, broadcast, retitle,
                                        archive, store, cache, publicly perform, publicly display, reformat, translate,
                                        transmit, excerpt (in whole or in part), and distribute such Contributions
                                        (including, without limitation, your image and voice) for any purpose, commercial,
                                        advertising, or otherwise, and to prepare derivative works of, or incorporate into
                                        other works, such Contributions, and grant and authorize sublicenses of the
                                        foregoing. The use and distribution may occur in any media formats and through any
                                        media channels.
                                        <br><br>
                                        This license will apply to any form, media, or technology now known or hereafter
                                        developed, and includes our use of your name, company name, and franchise name, as
                                        applicable, and any of the trademarks, service marks, trade names, logos, and
                                        personal and commercial images you provide. You waive all moral rights in your
                                        Contributions, and you warrant that moral rights have not otherwise been asserted in
                                        your Contributions.
                                        <br><br>
                                        We do not assert any ownership over your Contributions. You retain full ownership of
                                        all of your Contributions and any intellectual property rights or other proprietary
                                        rights associated with your Contributions. We are not liable for any statements or
                                        representations in your Contributions provided by you in any area on the Site. You
                                        are solely responsible for your Contributions to the Site and you expressly agree to
                                        exonerate us from any and all responsibility and to refrain from any legal action
                                        against us regarding your Contributions.
                                        <br><br>
                                        We have the right, in our sole and absolute discretion, <br>
                                        (1) to edit, redact, or otherwise change any Contributions;<br>
                                        (2) to re-categorize any Contributions to place them in more appropriate locations
                                        on the Site; and <br>
                                        (3) to pre-screen or delete any Contributions at any time and for any reason,
                                        without notice. We have no obligation to monitor your Contributions.
                                    </p>'
                    ],
                    [
                      'title' => 'GUIDELINES FOR REVIEWS',
                      'content' => '<p style="text-align:justify;">
                                        <i>We may provide you areas on the Site to leave reviews or ratings.
                                            When posting a review, you must comply with the following
                                            criteria:</i><br><br>
                                        (1) you should have firsthand experience with the person/entity being reviewed;
                                        <br>
                                        (2) your reviews should not contain offensive profanity, or abusive, racist,
                                        offensive, or hate language; <br>
                                        (3) your reviews should not contain discriminatory references based on religion,
                                        race, gender, national origin, age, marital status, sexual orientation, or
                                        disability;<br>
                                        (4) your reviews should not contain references to illegal activity; <br>
                                        (5) you should not be affiliated with competitors if posting negative reviews;<br>
                                        (6) you should not make any conclusions as to the legality of conduct; <br>
                                        (7) you may not post any false or misleading statements; and <br>
                                        (8) you may not organize a campaign encouraging others to post reviews, whether
                                        positive or negative.
                                        <br><br>
                                        We may accept, reject, or remove reviews in our sole discretion. We have absolutely
                                        no obligation to screen reviews or to delete reviews, even if anyone considers
                                        reviews objectionable or inaccurate. Reviews are not endorsed by us, and do not
                                        necessarily represent our opinions or the views of any of our affiliates or
                                        partners. We do not assume liability for any review or for any claims, liabilities,
                                        or losses resulting from any review. By posting a review, you hereby grant to us a
                                        perpetual, non-exclusive, worldwide, royalty-free, fully-paid, assignable, and
                                        sublicensable right and license to reproduce, modify, translate, transmit by any
                                        means, display, perform, and/or distribute all content relating to reviews.
                                    </p>'
                    ],
                    [
                      'title' => 'SOCIAL MEDIA',
                      'content' => '<p style="text-align:justify;">
                                        As part of the functionality of the Site, you may link your account with online
                                        accounts
                                        you have with third-party service providers (each such account,
                                        a “Third-Party Account”) by either:<br><br>
                                        (1) providing your Third-Party Account login information through the Site; or <br>
                                        (2) allowing us to access your Third-Party Account, as is permitted under the
                                        applicable
                                        terms and conditions that govern your use of each Third-Party Account. You represent
                                        and warrant
                                        that you are entitled to disclose your Third-Party Account login information
                                        to us and/or grant us access to your Third-Party Account, without breach
                                        by you of any of the terms and conditions that govern your use of the
                                        applicable Third-Party Account, and without obligating us to pay any
                                        fees or making us subject to any usage limitations imposed by the
                                        third-party service provider of the Third-Party Account.
                                        <br><br>
                                        By granting us access to any Third-Party Accounts, you understand that<br>
                                        (1) we may access, make available, and store (if applicable) any content
                                        that you have provided to and stored in your Third-Party Account (the “Social
                                        Network Content”)
                                        so that it is available on and through the Site via your account,
                                        including without limitation any friend lists and <br>
                                        (2) we may submit to and receive from your Third-Party Account
                                        additional information to the extent you are notified when you
                                        link your account with the Third-Party Account. <br>
                                        Depending on the Third-Party Accounts you choose and subject to
                                        the privacy settings that you have set in such Third-Party Accounts,
                                        personally identifiable information that you post to your Third-Party
                                        Accounts may be available on and through your account on the Site.
                                        Please note that if a Third-Party Account or associated service becomes
                                        unavailable or our access to such Third Party Account is terminated by
                                        the third-party service provider, then Social Network Content may no
                                        longer be available on and through the Site. You will have the ability
                                        to disable the connection between your account on the Site and your
                                        Third-Party Accounts at any time. PLEASE NOTE THAT YOUR RELATIONSHIP WITH
                                        THE THIRD-PARTY SERVICE PROVIDERS ASSOCIATED WITH YOUR THIRD-PARTY ACCOUNTS
                                        IS GOVERNED SOLELY BY YOUR AGREEMENT(S) WITH SUCH THIRD-PARTY SERVICE
                                        PROVIDERS. We make no effort to review any Social Network Content for
                                        any purpose, including but not limited to, for accuracy, legality,
                                        or non-infringement, and we are not responsible for any Social Network
                                        Content. You acknowledge and agree that we may access your email address
                                        book associated with a Third-Party Account and your contacts list stored on
                                        your mobile device or tablet computer solely for purposes of identifying and
                                        informing you of those contacts who have also registered to use the Site.
                                        You can deactivate the connection between the Site and your Third-Party
                                        Account by contacting us using the contact information below or through your
                                        account settings (if applicable). We will attempt to delete any information
                                        stored on our servers that was obtained through such Third-Party Account,
                                        except the username and profile picture that become associated with your
                                        account.
                                    </p>'
                    ],
                    [
                      'title' => 'SUBMISSIONS',
                      'content' => '<p style="text-align:justify;">
                                       You acknowledge and agree that any questions, comments, suggestions, ideas, feedback, or other information regarding the Site ("Submissions") provided by you to us are non-confidential and shall become our sole property. We shall own exclusive rights, including all intellectual property rights, and shall be entitled to the unrestricted use and dissemination of these Submissions for any lawful purpose, commercial or otherwise, without acknowledgment or compensation to you. You hereby waive all moral rights to any such Submissions, and you hereby warrant that any such Submissions are original with you or that you have the right to submit such Submissions. You agree there shall be no recourse against us for any alleged or actual infringement or misappropriation of any proprietary right in your Submissions.
                                    </p>'
                    ],
                    [
                      'title' => 'THIRD-PARTY WEBSITE AND CONTENT',
                      'content' => '<p style="text-align:justify;">
                                      The Site may contain (or you may be sent via the Site) links to other websites ("Third-Party Websites") as well as articles, photographs, text, graphics, pictures, designs, music, sound, video, information, applications, software, and other content or items belonging to or originating from third parties ("Third-Party Content"). Such Third-Party Websites and Third-Party Content are not investigated, monitored, or checked for accuracy, appropriateness, or completeness by us, and we are not responsible for any Third-Party Websites accessed through the Site or any Third-Party Content posted on, available through, or installed from the Site, including the content, accuracy, offensiveness, opinions, reliability, privacy practices, or other policies of or contained in the Third-Party Websites or the Third-Party Content. Inclusion of, linking to, or permitting the use or installation of any Third-Party Websites or any Third-Party Content does not imply approval or endorsement thereof by us. If you decide to leave the Site and access the Third-Party Websites or to use or install any Third-Party Content, you do so at your own risk, and you should be aware these Terms of Use no longer govern. You should review the applicable terms and policies, including privacy and data gathering practices, of any website to which you navigate from the Site or relating to any applications you use or install from the Site. Any purchases you make through Third-Party Websites will be through other websites and from other companies, and we take no responsibility whatsoever in relation to such purchases which are exclusively between you and the applicable third party. You agree and acknowledge that we do not endorse the products or services offered on Third-Party Websites and you shall hold us harmless from any harm caused by your purchase of such products or services. Additionally, you shall hold us harmless from any losses sustained by you or harm caused to you relating to or resulting in any way from any Third-Party Content or any contact with Third-Party Websites.
                                    </p>'
                    ],
                    [
                      'title' => 'ADVERTISERS',
                      'content' => '<p style="text-align:justify;">
                                       We allow advertisers to display their advertisements and other information in certain areas of the Site, such as sidebar advertisements or banner advertisements. If you are an advertiser, you shall take full responsibility for any advertisements you place on the Site and any services provided on the Site or products sold through those advertisements. Further, as an advertiser, you warrant and represent that you possess all rights and authority to place advertisements on the Site, including, but not limited to, intellectual property rights, publicity rights, and contractual rights. We simply provide the space to place such advertisements, and we have no other relationship with advertisers.
                                    </p>'
                    ],
                    [
                      'title' => 'SITE MANAGEMENT',
                      'content' => '<p style="text-align:justify;">
                                       <p style="text-align:justify;">
                                        We reserve the right, but not the obligation, to:<br>
                                        (1) monitor the Site for violations of these Terms of Use;<br>
                                        (2) take appropriate legal action against anyone who, in our sole discretion,
                                        violates the law or these Terms of Use, including without limitation,
                                        reporting such user to law enforcement authorities; <br>
                                        (3) in our sole discretion and without limitation,
                                        refuse, restrict access to, limit the availability of,
                                        or disable (to the extent technologically feasible) any of
                                        your Contributions or any portion thereof; <br>
                                        (4) in our sole discretion and without limitation, notice, or liability,
                                        to remove from the Site or otherwise disable all files and content that
                                        are excessive in size or are in any way burdensome to our systems; and<br>
                                        (5) otherwise manage the Site in a manner designed to protect our rights
                                        and property and to facilitate the proper functioning of the Site.
                                    </p>
                                    </p>'
                    ],
                    [
                      'title' => 'PRIVACY POLICY',
                      'content' => '<p style="text-align:justify;">
                                   We care about data privacy and security. Please review our Privacy Policy: http://www.schooldekho.co.in/privacy.php. By using the Site, you agree to be bound by our Privacy Policy, which is incorporated into these Terms of Use. Please be advised the Site is hosted in India. If you access the Site from any other region of the world with laws or other requirements governing personal data collection, use, or disclosure that differ from applicable laws in India, then through your continued use of the Site, you are transferring your data to India, and you agree to have your data transferred to and processed in India.
                                    </p>'
                    ],
                    [
                      'title' => 'COPYRIGHT INFRINGEMENTS',
                      'content' => '<p style="text-align:justify;">
                                        We reserve the right to change, modify, or remove the contents of the Site at any
                                        time or for any reason at our sole discretion without notice. However, we have no
                                        obligation to update any information on our Site. We also reserve the right to
                                        modify or discontinue all or part of the Site without notice at any time. We will
                                        not be liable to you or any third party for any modification, price change,
                                        suspension, or discontinuance of the Site.
                                        <br><br>
                                        We cannot guarantee the Site will be available at all times. We may experience
                                        hardware, software, or other problems or need to perform maintenance related to the
                                        Site, resulting in interruptions, delays, or errors. We reserve the right to change,
                                        revise, update, suspend, discontinue, or otherwise modify the Site at any time or
                                        for any reason without notice to you. You agree that we have no liability whatsoever
                                        for any loss, damage, or inconvenience caused by your inability to access or use the
                                        Site during any downtime or discontinuance of the Site. Nothing in these Terms of
                                        Use will be construed to obligate us to maintain and support the Site or to supply
                                        any corrections, updates, or releases in connection therewith.
                                    </p>'
                    ],
                    [
                      'title' => 'TERM AND TERMINATION',
                      'content' => '<p style="text-align:justify;">
                                       <p style="text-align:justify;">
                                        We reserve the right to change, modify, or remove the contents of the Site at any
                                        time or for any reason at our sole discretion without notice. However, we have no
                                        obligation to update any information on our Site. We also reserve the right to
                                        modify or discontinue all or part of the Site without notice at any time. We will
                                        not be liable to you or any third party for any modification, price change,
                                        suspension, or discontinuance of the Site.
                                        <br><br>
                                        We cannot guarantee the Site will be available at all times. We may experience
                                        hardware, software, or other problems or need to perform maintenance related to the
                                        Site, resulting in interruptions, delays, or errors. We reserve the right to change,
                                        revise, update, suspend, discontinue, or otherwise modify the Site at any time or
                                        for any reason without notice to you. You agree that we have no liability whatsoever
                                        for any loss, damage, or inconvenience caused by your inability to access or use the
                                        Site during any downtime or discontinuance of the Site. Nothing in these Terms of
                                        Use will be construed to obligate us to maintain and support the Site or to supply
                                        any corrections, updates, or releases in connection therewith.
                                    </p>
                                    </p>'
                    ],
                    [
                      'title' => 'GOVERNING LAW',
                      'content' => '<p style="text-align:justify;">
                                       These Terms shall be governed by and defined following the laws of India. School Dekho and yourself irrevocably consent that the courts of India shall have exclusive jurisdiction to resolve any dispute which may arise in connection with these terms.
                                    </p>'
                    ],
                    [
                      'title' => 'DISPUTE RESOLUTION',
                      'content' => '<p style="text-align:justify;">
                                     You agree to irrevocably submit all disputes related to Terms or the relationship established by this Agreement to the jurisdiction of the India courts. School Dekho shall also maintain the right to bring proceedings as to the substance of the matter in the courts of the country where you reside or, if these Terms are entered into in the course of your trade or profession, the state of your principal place of business.
                                    </p>'
                    ],
                    [
                      'title' => 'CORRECTIONS',
                      'content' => '<p style="text-align:justify;">
                                      There may be information on the Site that contains typographical errors, inaccuracies, or omissions, including descriptions, pricing, availability, and various other information. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the information on the Site at any time, without prior notice.
                                    </p>'
                    ],
                    [
                      'title' => 'DISCLAIMER',
                      'content' => '<p style="text-align:justify;">
                        <b>All content provided in this website is for educational purposes only.</b><br><br> The site is provided on an as-is and as-available basis. You agree that your use of the site and our services will be at your sole risk. To the fullest extent permitted by law, we disclaim all warranties, express or implied, in connection with the site and your use thereof, including, without limitation, the implied warranties of merchantability, fitness for a particular purpose, and non-infringement. We make no warranties or representations about the accuracy or completeness of the site’s content or the content of any websites linked to the site, and we will assume no liability or responsibility for any  - <br>
                        <ol>
                          
                          <li>Errors, mistakes, or inaccuracies of content and materials</li>  
                          <li>Personal injury or property damage, of any nature whatsoever, resulting from your access to and use of the site</li>  
                          <li>Any unauthorized access to or use of our secure servers and/or any and all personal information and/or financial information stored therein</li>  
                          <li>Any interruption or cessation of transmission to or from the site</li>  
                          <li>Any bugs, viruses, Trojan horses, or the like which may be transmitted to or through the site by any third party, and/or</li>  
                          <li>Any errors or omissions in any content and materials or for any loss or damage of any kind incurred as a result of the use of any content posted, transmitted, or otherwise made available via the site. We do not warrant, endorse, guarantee, or assume responsibility for any product or service advertised or offered by a third party through the site, any hyperlinked website, or any website or mobile application featured in any banner or other advertising, and we will not be a party to or in any way be responsible for monitoring any transaction between you and any third-party providers of products or services. As with the purchase of a product or service through any medium or in any environment, you should use your best judgment and exercise caution where appropriate.</li>  
                          
                        </ol>
                        </p>'
                    ],
                    [
                      'title' => 'LIMITATIONS OF LIABILITY',
                      'content' => '<p style="text-align:justify;">
                                      IN NO EVENT WILL WE OR OUR DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY DIRECT, INDIRECT, CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL, OR PUNITIVE DAMAGES, INCLUDING LOST PROFIT, LOST REVENUE, LOSS OF DATA, OR OTHER DAMAGES ARISING FROM YOUR USE OF THE SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.
                                    </p>'
                    ],
                    [
                      'title' => 'INDEMNIFICATION',
                      'content' => '<p style="text-align:justify;">
                                      You agree to defend, indemnify, and hold us harmless, including our subsidiaries,
                                      affiliates, and all of our respective officers, agents, partners, and employees,
                                      from and against any loss, damage, liability, claim, or demand, including reasonable
                                      attorneys’ fees and expenses, made by any third party due to or arising out of:
                                      <br>
                                      (1) your Contributions;<br> (2) use of the Site;<br> (3) breach of these Terms
                                      of Use; <br>
                                      (4) any breach of your representations and warranties set forth in these Terms of
                                      Use;<br>
                                      (5) your violation of the rights of a third party, including but
                                      not limited to intellectual property rights; or <br>
                                      (6) any overt harmful act toward any other user of the Site with
                                      whom you connected via the Site. <br><br>Notwithstanding the foregoing, we
                                      reserve the right, at your expense, to assume the exclusive defense and control of
                                      any matter for which you are required to indemnify us, and you agree to cooperate,
                                      at your expense, with our defense of such claims. We will use reasonable efforts to
                                      notify you of any such claim, action, or proceeding which is subject to this
                                      indemnification upon becoming aware of it.
                                    </p>'
                    ],
                    [
                      'title' => 'USER DATA',
                      'content' => '<p style="text-align:justify;">
                                     We will maintain certain data that you transmit to the Site for the purpose of managing the performance of the Site, as well as data relating to your use of the Site. Although we perform regular routine backups of data, you are solely responsible for all data that you transmit or that relates to any activity you have undertaken using the Site. You agree that we shall have no liability to you for any loss or corruption of any such data, and you hereby waive any right of action against us arising from any such loss or corruption of such data.
                                    </p>'
                    ],
                    [
                      'title' => 'ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES',
                      'content' => '<p style="text-align:justify;">
                                       Visiting the Site, sending us emails, and completing online forms constitute electronic communications. You consent to receive electronic communications, and you agree that all agreements, notices, disclosures, and other communications we provide to you electronically, via email and on the Site, satisfy any legal requirement that such communication be in writing. YOU HEREBY AGREE TO THE USE OF ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE. You hereby waive any rights or requirements under any statutes, regulations, rules, ordinances, or other laws in any jurisdiction which require an original signature or delivery or retention of non-electronic records, or to payments or the granting of credits by any means other than electronic means.
                                    </p>'
                    ],
                    [
                      'title' => 'MISCELLANEOUS',
                      'content' => '<p style="text-align:justify;">
                                     These Terms of Use and any policies or operating rules posted by us on the Site or in respect to the Site constitute the entire agreement and understanding between you and us. Our failure to exercise or enforce any right or provision of these Terms of Use shall not operate as a waiver of such right or provision. These Terms of Use operate to the fullest extent permissible by law. We may assign any or all of our rights and obligations to others at any time. We shall not be responsible or liable for any loss, damage, delay, or failure to act caused by any cause beyond our reasonable control. If any provision or part of a provision of these Terms of Use is determined to be unlawful, void, or unenforceable, that provision or part of the provision is deemed severable from these Terms of Use and does not affect the validity and enforceability of any remaining provisions. There is no joint venture, partnership, employment or agency relationship created between you and us as a result of these Terms of Use or use of the Site. You agree that these Terms of Use will not be construed against us by virtue of having drafted them. You hereby waive any and all defenses you may have based on the electronic form of these Terms of Use and the lack of signing by the parties hereto to execute these Terms of Use.
                                    </p>'
                    ],
                    [
                      'title' => 'CONTACT US',
                      'content' => '<p style="text-align:justify;">
                                       In order to resolve a complaint regarding the Site or to receive further information
                                        regarding use of the Site, please contact us at:
                                        <br><br><b style="font-weight: bold">
                                            School Dekho<br>
                                            1st Floor, Sati Plaza, Barrackpore Chiriamore Crossing, North 24 Parganas<br>
                                            Kolkata, West Bengal 700120<br>
                                            India<br>
                                            Phone: 9330902662<br>
                                            contact@schooldekho.co.in
                                        </b>
                                    </p>'
                    ],
                  ];
                  foreach ($accordionItems as $index => $item) {
                    $collapseId = 'collapse' . ($index + 1);
                    $accordionClass = 'accordion-item';
                    if ($index === 0) {
                      $accordionClass .= ' active';
                    }
                    ?>
								<div class="<?= $accordionClass ?>">
									<button
										class="accordion-button <?= $index === 0 ? ' ' : ' collapsed' ?>"
										data-bs-toggle="collapse" data-bs-target="#<?= $collapseId ?>">
										<i class="tutor-icon"></i>
										<?= $item['title'] ?>
									</button>
									<div
										class="accordion-collapse collapse<?= $index === 0 ? ' show' : '' ?>"
										id="<?= $collapseId ?>" data-bs-parent=".accordion">
										<div class="course-curriculum__lessons">
											<div class="course-curriculum__lesson">
												<?= $item['content'] ?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- Tutor Course Segment End -->
					</div>
					<!-- Tutor Course Main Segment End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Tutor Course Main content End -->
@endsection
@push('js')
@endpush
