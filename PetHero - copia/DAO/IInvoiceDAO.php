<?php
    namespace DAO;

    use Models\Invoice as Invoice;

    interface IInvoiceDAO {
        function Add( $invoice);
        function Remove($id);
        function GetById($id);
        function GetAll();
    }
?>