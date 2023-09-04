<?php

class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nama" => "otong",
    //         "nim" => "123",
    //         "jurusan" => "TI"
    //     ],
    //     [
    //         "nama" => "ucup",
    //         "nim" => "456",
    //         "jurusan" => "TE"
    //     ],
    //     [
    //         "nama" => "ujang",
    //         "nim" => "789",
    //         "jurusan" => "Memasak" 
    //     ]
    // ];

    // database handler
    // private $dbh;
    // private $stmt;
    private $table = 'tabel1';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        // $this->stmt = $this->dbh->prepare('SELECT * FROM tabel1');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByID($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO tabel1 
        VALUES 
        ('', :nama, :NIM, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM tabel1 WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE tabel1 SET
                    nama = :nama,
                    nim = :NIM,
                    jurusan = :jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
