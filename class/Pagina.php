<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagina
 *
 * @author Neturno
 */
class Pagina {
    
    private $idpagina;
    private $facebook;
    private $instagram;
    private $pinterest;
    private $twitter;
    private $google;
    private $site;
    
    public function getIdpagina() {
        return $this->idpagina;
    }

    public function getFacebook() {
        return $this->facebook;
    }

    public function getInstagram() {
        return $this->instagram;
    }

    public function getPinterest() {
        return $this->pinterest;
    }

    public function getTwitter() {
        return $this->twitter;
    }

    public function getGoogle() {
        return $this->google;
    }

    public function getSite() {
        return $this->site;
    }

    public function setIdpagina($idpagina) {
        $this->idpagina = $idpagina;
    }

    public function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    public function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    public function setPinterest($pinterest) {
        $this->pinterest = $pinterest;
    }

    public function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    public function setGoogle($google) {
        $this->google = $google;
    }

    public function setSite($site) {
        $this->site = $site;
    }
    
}
