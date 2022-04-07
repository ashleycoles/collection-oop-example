<?php

declare(strict_types=1);


class Driver
{
    protected PDO $db;
    protected int $id;
    protected string $name;
    protected int $wins;
    protected int $poles;
    protected string $image;

    /**
     * @param PDO $db
     * @param string $image
     * @param string $name
     * @param int $wins
     * @param int $poles
     * @param int $id
     * @throws Exception
     */
    public function __construct(PDO $db, string $image, string $name, int $wins, int $poles, int $id = 0)
    {
        $this->id = $id;
        $this->setName($name);
        $this->setWins($wins);
        $this->setPoles($poles);
        $this->setImage($image);
        $this->db = $db;
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if (strlen($name) > 5 && strlen($name) < 56) {
            $this->name = $name;
        } else {
            throw new Exception('Driver name invalid');
        }
    }

    /**
     * @param int $wins
     * @return void
     * @throws Exception
     */
    public function setWins(int $wins): void
    {
        if ($wins < 1000 && $wins >= 0) {
            $this->wins = $wins;
        } else {
            throw new Exception('Wins invalid');
        }
    }

    /**
     * @param int $poles
     * @return void
     * @throws Exception
     */
    public function setPoles(int $poles): void
    {
        if ($poles < 1000 & $poles >= 0) {
            $this->poles = $poles;
        } else {
            throw new Exception('Poles invalid');
        }
    }

    /**
     * @param string $image
     * @return void
     * @throws Exception
     */
    public function setImage(string $image): void
    {
        if (strlen($image) < 255) {
            $this->image = $image;
        } else {
            throw new Exception('Image invalid');
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getWins(): int
    {
        return $this->wins;
    }

    /**
     * @return int
     */
    public function getPoles(): int
    {
        return $this->poles;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Update the DB with any changes made to the Driver
     *
     * @return void
     */
    public function update()
    {
        $query = $this->db->prepare('UPDATE `drivers` SET `name` = :name, `wins` = :wins, `poles` = :poles, `image` = :image WHERE `id` = :id;');

        $name = $this->getName();
        $wins = $this->getWins();
        $id = $this->getId();
        $poles = $this->getPoles();
        $image = $this->getImage();

        $query->bindParam(':name', $name);
        $query->bindParam(':wins', $wins);
        $query->bindParam(':image', $image);
        $query->bindParam(':poles', $poles);
        $query->bindParam(':id', $id);

        $query->execute();
    }
}