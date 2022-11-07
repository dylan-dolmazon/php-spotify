<?php

namespace App\Entity;

class Musique
{

    public function __construct(

        public string|null $id,

        public string|null $name,

        public string|null $link,

        public int $duration_ms,

    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLink(): string|null
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param int $duration_ms
     */
    public function setDurationMs(int $duration_ms): void
    {
        $this->duration_ms = $duration_ms;
    }

    /**
     * @return int
     */
    public function getDurationMs(): string
    {
        return '0'.floor($this->duration_ms/60000).':'.floor(($this->duration_ms%60000)/1000).':'.str_pad(floor($this->duration_ms%1000),1, STR_PAD_LEFT);
    }

    public function display(): string
    {
        return '<div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
                <img src="https://www.supercadeaux.fr/wp-content/uploads/2019/02/Disque-Dor-personnalisee-1.jpg" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <p class="card-text">'. $this->getDurationMs() .'</p>
                    <p class="card-text"></p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }

}