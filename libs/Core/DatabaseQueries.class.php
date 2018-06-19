<?php

require_once __DIR__ . '/../CustomPDO.class.php';

class DB
{
    static public $pdo;

    public static function init()
    {
        if (empty(self::$pdo)) {
            self::$pdo = new CustomPDO(Setting::$dbHost, Setting::$dbUser, Setting::$dbPassword, Setting::$dbName);
        }
    }

    /**
     * @access protected
     * @param $dataBase - имя таблицы данных
     * @param array $dataWhere - массив полей для выборки
     * @param array $dataSelect - Массив молей которе нужно забрать
     * @param bool $fetch - false - 1 запись true все записи
     * @param $dataLimit - Лимит массив 1,2 значений
     * @return array массив данных из базы
     * @throws Exception
     */
    public static function SelectData($dataBase = null, $dataWhere = null, $dataSelect = ['*'], $fetch = false, $dataLimit = [])
    {
        $limit = null;
        $fetchText = 'fetch';
        $whereCol = '';

        if ($fetch == true) {
            $fetchText = 'fetchAll';
        }

        if ($dataSelect === 'All') {
            $dataSelect = ['*'];
        }

        if (empty($dataBase)) {
            throw new Exception('SelectData: no dataBase!');
        }

        if (count($dataLimit) > 2) {
            throw new Exception('dataLimit: Only 2 argument!');
        }

        $selectCol = implode(",", $dataSelect);

        if (isset($dataWhere)) {
            $whereCol = 'WHERE';

            foreach ($dataWhere as $key => $value) {
                $whereCol .= ' ' . $key . ' = :' . $key . ' and';
            }

            $whereCol = mb_substr($whereCol, 0, -3);
        }

        if (!empty($dataLimit)) {
            $limit = (count($dataLimit) == 1) ? ' LIMIT ' . $dataLimit[0] : ' LIMIT ' . $dataLimit[0] . ', ' . $dataLimit[1];
        }

        try {
            $query = "SELECT " . $selectCol . " FROM `" . $dataBase . "` " . $whereCol . $limit;
            $dataReturn = self::$pdo->query($query, $dataWhere, $fetchText);

            return $dataReturn;
        } catch (Exception $e) {
            echo $e . ' error query base';
        }
    }

    public static function query($query = null, $fetch = false)
    {

        $fetchText = 'fetch';

        if ($fetch == true) {
            $fetchText = 'fetchAll';
        }

        if (empty($query)) {
            throw new Exception('Query is empty!');
        }

        try {
            $dataReturn = self::$pdo->query($query, null, $fetchText);

            return $dataReturn;
        } catch (Exception $e) {
            echo $e . ' error query base';
        }
    }

    /**
     * @access protected
     * @param $dataBase - имя таблицы
     * @param $dataInsert - Массив полей которе нужно записать
     * @return string - id вставленой записи
     * @throws Exception
     */
    public static function InsertData($dataBase = null, $dataInsert = null)
    {
        $insertColVar = '';
        $insertCol = '';

        if (empty($dataInsert)) {
            throw new Exception('dataInsert: not fild');
        }
        if (empty($dataBase)) {
            throw new Exception('SelectData: no dataBase!');
        }
        foreach ($dataInsert as $key => $value) {
            $insertColVar .= ' :' . $key . ',';
            $insertCol .= ' ' . $key . ',';
        }
        $insertColVar = mb_substr($insertColVar, 0, -1);
        $insertCol = mb_substr($insertCol, 0, -1);

        try {
            $query = "INSERT INTO `" . $dataBase . "` (" . $insertCol . ") VALUES (" . $insertColVar . ")";
            self::$pdo->query($query, $dataInsert);

            return self::$pdo->getInsertID();
        } catch (Exception $e) {
            throw new Exception($e . ' error query base');
        }
    }

    /**
     * @access protected
     * @param $dataBase - имя таблицы
     * @param $dataUpdate - Массив полей которе нужно обновить
     * @param $dataWhere - массив полей для выборки
     * @return bool - успешно или неуспешно
     * @throws Exception
     */
    public static function UpdateData($dataBase = null, $dataUpdate = null, $dataWhere = null)
    {
        $whereCol = '';
        $updateColVar = '';

        if (empty($dataUpdate)) {
            throw new Exception('dataInsert: not fild');
            exit();
        }

        if (empty($dataBase)) {
            throw new Exception('SelectData: no dataBase!');
            exit();
        }

        if (empty($dataWhere)) {
            throw new Exception('SelectData: no dataBase!');
            exit();
        }

        foreach ($dataWhere as $key => $value) {
            $whereCol .= ' ' . $key . ' = :' . $key . ' and';
        }

        $whereCol = mb_substr($whereCol, 0, -3);

        foreach ($dataUpdate as $key => $value) {
            $updateColVar .= ' ' . $key . ' = :' . $key . ',';
        }

        $updateColVar = mb_substr($updateColVar, 0, -1);
        $arrayQuery = array_merge($dataUpdate, $dataWhere);

        try {
            $query = "UPDATE `" . $dataBase . "` SET " . $updateColVar . " WHERE " . $whereCol;
            self::$pdo->query($query, $arrayQuery);

            return true;
        } catch (Exception $e) {
            echo $e . ' error query base';
        }
    }

    /**
     * @access protected
     * @param $dataBase - имя таблицы данных
     * @param $dataWhere - массив полей для выборки
     * @return array массив данных из базы
     * @throws Exception
     * @internal param $dataSelect - Массив молей которе нужно забрать
     * @internal param $dataLimit - Лимит массив 1,2 значений
     * @internal param $fetch - false - 1 запись true все записи
     */
    public static function DeleteData($dataBase = null, $dataWhere = null)
    {
        $whereCol = '';

        if (empty($dataBase)) {
            throw new Exception('SelectData: no dataBase!');
            exit();
        }

        if (isset($dataWhere)) {
            $whereCol = 'WHERE';

            foreach ($dataWhere as $key => $value) {
                $whereCol .= ' ' . $key . ' = :' . $key . ' and';
            }

            $whereCol = mb_substr($whereCol, 0, -3);
        }

        try {
            $query = "DELETE FROM `" . $dataBase . "` " . $whereCol;
            $dataReturn = self::$pdo->query($query, $dataWhere);
            return $dataReturn;
        } catch (Exception $e) {
            echo $e . ' error query base';
        }
    }
}