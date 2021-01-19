<?php

class VisitsManager {
    public function __construct(
        private DBConnectionInterface $DBConnection
    ) { }

    # registers and count the visitors
    public function countUsersVisits(): void {
        setcookie('visit', 'true', time() - 1);

        if (!isset($_COOKIE['visit'])) {
            // expire in 7 days       (seconds | minutes | hours | days)
            setcookie('visit', 'true', time() + (pow(60, 2) * 24 * 7));

            $query = $this -> DBConnection -> connect() -> prepare(
               "INSERT INTO `tb_admin.visits`
                VALUES (null, ?, ?);"
            );

            $query -> execute([
                $_SERVER['REMOTE_ADDR'], date('Y-m-d')
            ]);
        }
    }

    # return the number of visits over the lifetime of the website
    public function getVisitsList(): int {
        $query = $this -> DBConnection -> connect() -> prepare(
            "SELECT * FROM `tb_admin.visits`"
        );

        $query -> execute();

        return $query -> rowCount();
    }

    # return the number of visits in the current day
    public function getDiaryVisitsList(): int {
        $query = $this -> DBConnection -> connect() -> prepare(
           "SELECT * FROM `tb_admin.visits`
            WHERE `date` = ?"
        );

        $query -> execute([
            date('Y-m-d')
        ]);

        return $query -> rowCount();
    }
}