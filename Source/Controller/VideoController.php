<?php
spl_autoload_register(function ($className) {
    $path = __DIR__ . "/../Model/Repository/$className.php";
    if (is_file($path)) include_once $path;
});
class VideoController extends Controller
{
    public static function getAll() : array {
        return VideoRepository::selectAll();
    }

    public static function get(string $id) : ?Video
    {
        $result = VideoRepository::select($id);
        if (!$result) return null;
        return get_class($result) == "Video" ? $result : null;
    }

    public static function upload(int $channel, string $title, ?string $description, string $tmp_name, string $ext) : ?string {
        $video = VideoFromTitleRepository::insertGet(new Video(null, $title, $description, $channel, null, $ext));
        if ($video) {
            $path = "../Assets/vid/" . $video->getId() . "." . $ext;
            $upload = move_uploaded_file($tmp_name, $path);
            if(!$upload) VideoRepository::delete($video->getId());
            Controller::log($upload ? 'written ' . $title . ' to ' . $path : 'failed to write ' . $title . ' to ' . $path);
            return $upload ? null : '';
        } else {
            Controller::log('failed to insert ' . $title . ' into database');
            $lang = Controller::getLang();
            return $lang::getItem('upload_video-database-upload');
        }
    }

    public static function delete(string $id) : bool {
        return VideoRepository::delete($id) and unlink('../Assets/vid/'.$_GET['video'] . '.mp4');
    }
}
