<?php
class Pelanggan
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }



    public function create($id_pel, $nm_pel, $alamat)
    {
        $query = "INSERT INTO pelanggan (id_pel, nm_pel, alamat) VALUES (:id_pel, :nm_pel, :alamat)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pel', $id_pel);
        $stmt->bindParam(':nm_pel', $nm_pel);
        $stmt->bindParam(':alamat', $alamat);

        return $stmt->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM pelanggan WHERE id_pel = :id_pel";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pel', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_pel, $nm_pel, $alamat)
    {
        $query = "UPDATE pelanggan SET nm_pel = :nm_pel, alamat = :alamat WHERE id_pel = :id_pel";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pel', $id_pel);
        $stmt->bindParam(':nm_pel', $nm_pel);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM pelanggan WHERE id_pel = :id_pel";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pel', $id);
        return $stmt->execute();
    }
}
