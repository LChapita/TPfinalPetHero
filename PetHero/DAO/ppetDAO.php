<?php
    namespace DAO;

    use Models\Pet as Pet;

    interface ppetDAO {
        function Add( $Pet);
        function Remove($id);
        function GetById($id);
        function GetAll();
    }
?>