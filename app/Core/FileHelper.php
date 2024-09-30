<?php

namespace App\Core;

use Exception;

class FileHelper
{
    public static $image_extensions = [".jpg", ".gif", ".png", ".jpeg", ".JPG"];
    public static $video_extensions = [".mp4", ".3gp", ".avi"];
    public static $audio_extensions = [".mp3", ".wav"];

    public static $document_extensions = [".pdf", ".doc", ".docx", ".txt", ".odt"];
    public  static $dir_path = "uploads/";
    public  static $logo_path = "logo/";
    public  static $principal = "principal/";
    public  static $gallery  = "gallery/";
    public  static $mou      = "mou/";

    public static $consent_document = "consent/"; 
    public  static $whatsapp = "whatsapp/";
    public static $complimentary_image = "complimentary/";
    public static $application_image_path = "uploads/applicationform";

    public static $resume = "resume/";
    public static $articlebanner = "articlebanner/";

    public static $summernote = "summernote/";
    private static function FileInfo($file_name): ?FileInfo
    {
        if (!$file_name) {
            return null;
        }
        $path = self::GetPathData($file_name);
        $extension = $path->extension;
        $file_name = $path->file_name;
        $data = new FileInfo();
        $data->extension = $extension;
        $data->file_name = $file_name;
        if (in_array($extension, self::$image_extensions)) {
            $data->dir_path = self::$dir_path . "images/";
            $data->type = FileType::$image;
            return $data;
        }
        if (in_array($extension, self::$video_extensions)) {
            $data->dir_path = self::$dir_path . "videos/";
            $data->type = FileType::$video;
            return $data;
        }
        if (in_array($extension, self::$audio_extensions)) {
            $data->dir_path = self::$dir_path . "audios/";
            $data->type = FileType::$audio;
            return $data;
        }
        if (in_array($extension, self::$document_extensions)) {
            $data->dir_path = self::$dir_path . "documents/";
            $data->type = FileType::$document;
            return $data;
        }
        if (!in_array($extension, self::$image_extensions) || !in_array($extension, self::$audio_extensions) || !in_array($extension, self::$video_extensions)) {
            $data->dir_path = self::$dir_path . "others/";
            $data->type = FileType::$other;
            return $data;
        }
        return null;
    }
    public static    function UploadEncodedFile($encoded_string, $target_dir = '')
    {
        $encoded_string = preg_replace('#^data:image/\w+;base64,#i', '', $encoded_string);
        $decoded_file = base64_decode($encoded_string);
        $mime_type = finfo_buffer(finfo_open(), $decoded_file, FILEINFO_MIME_TYPE);
        $extension = self::Mime2ext($mime_type);
        $file = uniqid() . '.' . $extension;
        $file_dir = $target_dir . $file;
        try {
            $success = file_put_contents($file_dir, $decoded_file);
            header('Content-Type: application/json');
            return $success ? $file : false;
        } catch (Exception $e) {
            header('Content-Type: application/json');
        }
    }
    private static function Mime2ext($mime)
    {
        $all_mimes = '{"png":["image\/png","image\/x-png"],"bmp":["image\/bmp","image\/x-bmp",
		"image\/x-bitmap","image\/x-xbitmap","image\/x-win-bitmap","image\/x-windows-bmp",
		"image\/ms-bmp","image\/x-ms-bmp","application\/bmp","application\/x-bmp",
		"application\/x-win-bitmap"],"gif":["image\/gif"],"jpeg":["image\/jpeg",
		"image\/pjpeg"],"xspf":["application\/xspf+xml"],"vlc":["application\/videolan"],
		"wmv":["video\/x-ms-wmv","video\/x-ms-asf"],"au":["audio\/x-au"],
		"ac3":["audio\/ac3"],"flac":["audio\/x-flac"],"ogg":["audio\/ogg",
		"video\/ogg","application\/ogg"],"kmz":["application\/vnd.google-earth.kmz"],
		"kml":["application\/vnd.google-earth.kml+xml"],"rtx":["text\/richtext"],
		"rtf":["text\/rtf"],"jar":["application\/java-archive","application\/x-java-application",
		"application\/x-jar"],"zip":["application\/x-zip","application\/zip",
		"application\/x-zip-compressed","application\/s-compressed","multipart\/x-zip"],
		"7zip":["application\/x-compressed"],"xml":["application\/xml","text\/xml"],
		"svg":["image\/svg+xml"],"3g2":["video\/3gpp2"],"3gp":["video\/3gp","video\/3gpp"],
		"mp4":["video\/mp4"],"m4a":["audio\/x-m4a"],"f4v":["video\/x-f4v"],"flv":["video\/x-flv"],
		"webm":["video\/webm"],"aac":["audio\/x-acc"],"m4u":["application\/vnd.mpegurl"],
		"pdf":["application\/pdf","application\/octet-stream"],
		"pptx":["application\/vnd.openxmlformats-officedocument.presentationml.presentation"],
		"ppt":["application\/powerpoint","application\/vnd.ms-powerpoint","application\/vnd.ms-office",
		"application\/msword"],"docx":["application\/vnd.openxmlformats-officedocument.wordprocessingml.document"],
		"xlsx":["application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application\/vnd.ms-excel"],
		"xl":["application\/excel"],"xls":["application\/msexcel","application\/x-msexcel","application\/x-ms-excel",
		"application\/x-excel","application\/x-dos_ms_excel","application\/xls","application\/x-xls"],
		"xsl":["text\/xsl"],"mpeg":["video\/mpeg"],"mov":["video\/quicktime"],"avi":["video\/x-msvideo",
		"video\/msvideo","video\/avi","application\/x-troff-msvideo"],"movie":["video\/x-sgi-movie"],
		"log":["text\/x-log"],"txt":["text\/plain"],"css":["text\/css"],"html":["text\/html"],
		"wav":["audio\/x-wav","audio\/wave","audio\/wav"],"xhtml":["application\/xhtml+xml"],
		"tar":["application\/x-tar"],"tgz":["application\/x-gzip-compressed"],"psd":["application\/x-photoshop",
		"image\/vnd.adobe.photoshop"],"exe":["application\/x-msdownload"],"js":["application\/x-javascript"],
		"mp3":["audio\/mpeg","audio\/mpg","audio\/mpeg3","audio\/mp3"],"rar":["application\/x-rar","application\/rar",
		"application\/x-rar-compressed"],"gzip":["application\/x-gzip"],"hqx":["application\/mac-binhex40",
		"application\/mac-binhex","application\/x-binhex40","application\/x-mac-binhex40"],
		"cpt":["application\/mac-compactpro"],"bin":["application\/macbinary","application\/mac-binary",
		"application\/x-binary","application\/x-macbinary"],"oda":["application\/oda"],
		"ai":["application\/postscript"],"smil":["application\/smil"],"mif":["application\/vnd.mif"],
		"wbxml":["application\/wbxml"],"wmlc":["application\/wmlc"],"dcr":["application\/x-director"],
		"dvi":["application\/x-dvi"],"gtar":["application\/x-gtar"],"php":["application\/x-httpd-php",
		"application\/php","application\/x-php","text\/php","text\/x-php","application\/x-httpd-php-source"],
		"swf":["application\/x-shockwave-flash"],"sit":["application\/x-stuffit"],"z":["application\/x-compress"],
		"mid":["audio\/midi"],"aif":["audio\/x-aiff","audio\/aiff"],"ram":["audio\/x-pn-realaudio"],
		"rpm":["audio\/x-pn-realaudio-plugin"],"ra":["audio\/x-realaudio"],"rv":["video\/vnd.rn-realvideo"],
		"jp2":["image\/jp2","video\/mj2","image\/jpx","image\/jpm"],"tiff":["image\/tiff"],
		"eml":["message\/rfc822"],"pem":["application\/x-x509-user-cert","application\/x-pem-file"],
		"p10":["application\/x-pkcs10","application\/pkcs10"],"p12":["application\/x-pkcs12"],
		"p7a":["application\/x-pkcs7-signature"],"p7c":["application\/pkcs7-mime","application\/x-pkcs7-mime"],"p7r":["application\/x-pkcs7-certreqresp"],"p7s":["application\/pkcs7-signature"],"crt":["application\/x-x509-ca-cert","application\/pkix-cert"],"crl":["application\/pkix-crl","application\/pkcs-crl"],"pgp":["application\/pgp"],"gpg":["application\/gpg-keys"],"rsa":["application\/x-pkcs7"],"ics":["text\/calendar"],"zsh":["text\/x-scriptzsh"],"cdr":["application\/cdr","application\/coreldraw","application\/x-cdr","application\/x-coreldraw","image\/cdr","image\/x-cdr","zz-application\/zz-winassoc-cdr"],"wma":["audio\/x-ms-wma"],"vcf":["text\/x-vcard"],"srt":["text\/srt"],"vtt":["text\/vtt"],"ico":["image\/x-icon","image\/x-ico","image\/vnd.microsoft.icon"],"csv":["text\/x-comma-separated-values","text\/comma-separated-values","application\/vnd.msexcel"],"json":["application\/json","text\/json"]}';
        $all_mimes = json_decode($all_mimes, true);
        foreach ($all_mimes as $key => $value) {
            if (array_search($mime, $value) !== false) return $key;
        }
        return false;
    }
    public static function Upload($file, string $exist_file_name = null, string $upload_path = null): FileResponse
    {
        $result = new FileResponse();
        if (!$file) {
            $result->message = "Select a File";
            return $result;
        }
        if (gettype($file) == "string") {
            $result->message = "Select a File";
            return $result;
        }
        if ($upload_path) {
            $dir_path = self::GetStoragePath($upload_path);
            if (is_dir($dir_path)) {
                $result = self::DoUpload($result, $file, $upload_path);
                if ($exist_file_name) {
                    self::Delete($exist_file_name, $upload_path);
                }
                return $result;
            }
            $result->message = "Upload path not created";
            return $result;
        }
        $original_name = $file->getClientOriginalName();
        $info = self::FileInfo($original_name);
        if (!$info) {
            $result->message = "Invalid File";
            return $result;
        }
        //For Create Folder
        $dir_path = self::GetStoragePath(self::$dir_path);
        if (!is_dir($dir_path)) {
            mkdir($dir_path);
        }
        $dir_path = self::GetStoragePath($info->dir_path);
        if (!is_dir($dir_path)) {
            mkdir($dir_path);
        }
        $result = self::DoUpload($result, $file, $info->dir_path);
        if ($exist_file_name) {
            self::Delete($exist_file_name);
        }
        return $result;
    }
    private static function DoUpload(FileResponse $result, $file, string $upload_path): FileResponse
    {
        $original_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        if (!$extension || empty($extension)) {
            $extension = "nuf";
        }
        $tmp_name = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);
        $newName = $tmp_name . "." . $extension;
        $result->original_name = $original_name;
        $result->upload_name = $newName;
        $result->status = true;
        $result->message = "Uploaded successfully done";
        $file->move(self::GetStoragePath($upload_path), $newName);
        return $result;
    }
    private static function GetStoragePath($dir_path): string
    {
        if (!$dir_path) return  storage_path("app/public/");
        return storage_path("app/public/" . $dir_path);
    }
    private static function GetFileDirPath($file_name): ?string
    {
        $fileInfo = self::FileInfo($file_name);
        if (!$fileInfo) {
            return null;
        }
        return $fileInfo->dir_path . $fileInfo->file_name;
    }
    public static function GetFileUrl($file_name, $upload_path = null): ?string
    {
        if (!$file_name) {
            return "";
        }
        if ($upload_path) {
            return asset("storage/" . $upload_path . "/" . $file_name);
        }
        return asset("storage/" . self::GetFileDirPath($file_name));
    }
    public static function Delete(string $file_name, string $upload_path = null): bool
    {
        $path_data = self::GetPathData($file_name);
        if ($upload_path) {
            $path = self::GetStoragePath($upload_path . "/" . $path_data->file_name);
            if (is_file($path)) {
                unlink($path);
                return true;
            }
            return false;
        }
        $file_url = self::GetFileDirPath($path_data->file_name);
        $path = self::GetStoragePath($file_url);
        if (is_file($path)) {
            unlink($path);
            return true;
        }
        return false;
    }
    public static function GetPathData($url): PathData
    {
        $path = pathinfo($url);
        $extension = null;
        if (isset($path['extension'])) {
            $extension = "." . $path['extension'];
        }
        $obj = new PathData();
        $obj->name = $path['filename'];
        $obj->extension = $extension;
        $obj->file_name = $obj->name . $obj->extension;
        return $obj;
    }
}
class FileInfo
{
    public $type;
    public $file_name;
    public $dir_path;
    public $extension;
}
class FileResponse
{
    public $status = false;
    public $upload_name;
    public $message;
    public $original_name;
}
class FileType
{
    public static $image = 0;
    public static $video = 1;
    public static $audio = 2;
    public static $other = 3;

    public static $document = 4;
}
class PathData
{
    public $name;
    public $extension;
    public $file_name;
}
