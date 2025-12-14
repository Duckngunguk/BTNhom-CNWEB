<?php
require_once "models/Material.php";
require_once "helpers/Auth.php";

class MaterialController {

    public function upload() {
        requireRole(1);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['file'];

            $path = "assets/uploads/materials/";
            $filename = time() . "_" . $file['name'];

            move_uploaded_file($file['tmp_name'], $path . $filename);

            $material = new Material();
            $material->create([
                'lesson_id' => $_POST['lesson_id'],
                'filename' => $file['name'],
                'file_path' => $path . $filename,
                'file_type' => pathinfo($file['name'], PATHINFO_EXTENSION)
            ]);

            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit;
        }

        require_once "views/instructor/materials/upload.php";
    }
}
