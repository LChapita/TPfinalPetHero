<?php
    namespace DAO;

    use Models\InvoiceCategory as InvoiceCategory;

    interface IInvoiceCategoryDAO {
        function GetById($id);

    }
?>