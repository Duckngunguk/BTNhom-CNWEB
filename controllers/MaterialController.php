<?php
require_once "models/Material.php";

class MaterialController {

    public function upload() {
        require_once "views/instructor/materials/upload.php";
    }

    public function handleUpload() {
        $file = $_FILES['file'];
        $path = "assets/uploads/materials/" . time() . "_" . $file['name'];

        move_uploaded_file($file['tmp_name'], $path);

        Material::create([
            $_POST['lesson_id'],
            $file['name'],
            $path,
            $file['type']
        ]);

        echo "Upload thành công";
    }
}
