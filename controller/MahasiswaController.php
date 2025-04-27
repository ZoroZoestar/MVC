<?php
require_once 'model/Mahasiswa.php';
require_once 'view/MahasiswaView.php';

class MahasiswaController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Mahasiswa();
        $this->view = new MahasiswaView();
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'tambah':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->tambahMahasiswa();
                } else {
                    $this->view->formMahasiswa('tambah');
                }
                break;

            case 'edit':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->updateMahasiswa();
                } else {
                    $id = $_GET['id'];
                    $mahasiswa = $this->model->getById($id);
                    $this->view->formMahasiswa('edit', $mahasiswa);
                }
                break;

            case 'hapus':
                $this->hapusMahasiswa();
                break;

            default:
                $this->tampilkanMahasiswa();
                break;
        }
    }

    private function tampilkanMahasiswa() {
        $data = $this->model->getAll();
        $this->view->tampilkanMahasiswa($data);
    }

    private function tambahMahasiswa() {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];

        $this->model->create($nim, $nama, $jurusan);
        header('Location: index.php');
    }

    private function updateMahasiswa() {
        $id = $_GET['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];

        $this->model->update($id, $nim, $nama, $jurusan);
        header('Location: index.php');
    }

    private function hapusMahasiswa() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header('Location: index.php');
    }
}
?>
