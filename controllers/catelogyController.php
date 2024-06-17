<?php

class CatelogyController
{
    public function index()
    {
        $this->checkLoginAdmin();
        global $params;
        $pageSize = 12;
        $pageNum = isset($params['page']) ? $params['page'] : 1;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;
        $pageTitle = "Catelogy List";
        $contentView = "views/admin/catelogylist.php";
        include "views/admin/layout.php";
    }

    public function add()
    {
        $this->checkLoginAdmin();

        $pageTitle = "Catelogy Add";
        $contentView = "views/admin/catelogyadd.php";
        include "views/admin/layout.php";
    }

    public function add_()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validateFormCatAdd();

        if (empty($errors)) {
            $ten_loai = trim(strip_tags($_POST['ten_loai']));
            $thutu = (int) $_POST['thutu'];
            $anhien = (int) $_POST['anhien'];
            $id_loai = Catelogy::catelogy_add($ten_loai, $thutu, $anhien);
            redirect("admin/catelogy");
        } else {
            $pageTitle = "Catelogy Add";
            $contentView = "views/admin/catelogyadd.php";
            include "views/admin/layout.php";
        }
    }

    public function edit()
    {
        $this->checkLoginAdmin();
        global $params;
        $id_loai = $params['id_loai'];
        $pageTitle = "Catelogy Edit";
        $contentView = "views/admin/catelogyedit.php";
        include "views/admin/layout.php";
    }

    public function edit_()
    {
        $id_loai = (int) $_POST['id_loai'];
        $ten_loai = trim(strip_tags($_POST['ten_loai']));
        $thutu = (int) $_POST['thutu'];
        $anhien = (int) $_POST['anhien'];
        Catelogy::catelogy_update($id_loai, $ten_loai, $thutu, $anhien);
        redirect("admin/catelogyedit?id_loai={$id_loai}");
    }

    public function delete()
    {
        global $params;
        $id_loai = $params['id_loai'];
        Catelogy::catelogy_delete($id_loai);
        redirect("admin/catelogy");
    }

    private function checkLoginAdmin()
    {
        if (isset($_SESSION['vaitro']) && $_SESSION['vaitro'] !== 1) {
            redirect("");
        }
    }
}

$catelogyController = new CatelogyController;
