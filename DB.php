<?php

class DB
{
    private $host;

    private $database;

    private $user;

    private $password;

    private $link;

    public function __construct($host, $database, $user, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    public function createQuery($query)
    {
        if ($this->link) {
            $result = mysqli_query(
                $this->link,
                $query
            ) or die(
                "Ошибка " . mysqli_error($this->link)
            );
        }
        return $result ? $result : 'пустой запрос';
    }

    public function openConnect()
    {
        $localhost = $this->host;
        $user = $this->user;
        $password = $this->password;
        $refactor = $this->database;
        $this->link = mysqli_connect(
            $localhost,
            $user,
            $password,
            $refactor
        ) or die(
            "Ошибка " . mysqli_error($this->link)
        );
    }

    public function closeConnect()
    {
        mysqli_close($this->link);
    }
}