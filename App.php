<?php

class App
{
    /**
     * Envoyer des données au client
     *
     * @param string $message
     * @param boolean $success
     * @param array $data
     */
    public function sendData($message, $success = false, $data = array())
    {
        $result["success"] = $success;
        $result["message"] = $message;
        $result["data"] = $data;
        header("Content-Type:application/json");
        echo json_encode($result);
    }
}
