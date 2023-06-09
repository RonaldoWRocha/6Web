<?php

/**
 * Class Alert
 *
 */
class Alert
{

    public static function AjaxSuccess($descryption, $title = " Sucesso!")
    {
        return ["alert alert-success", "fa fa-check", $title, $descryption];
    }

    public static function AjaxInfo($descryption, $title = " Informação!")
    {
        return ["alert alert-info", "fa fa-info", $title, $descryption];
    }

    public static function AjaxWarning($descryption, $title = " Atenção!")
    {
        return ["alert alert-warning", "fa fa-warning", $title, $descryption];
    }

    public static function AjaxDanger($descryption, $title = " Cuidado!")
    {
        return ["alert alert-danger", "fa fa-ban", $title, $descryption];
    }

    public static function AjaxRedirect($toWhere, $time = 3200)
    {
        return [$toWhere, $time];
    }

}
