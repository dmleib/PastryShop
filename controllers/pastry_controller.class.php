<?php
/**
 * Author: Deirdre Leib
 * Date: 11/15/24
 * File: pastry_controller.class.php
 * Description:
 */


require_once 'models/pastry_model.class.php';

class PastryController
{
    public function index(): void
    {
        $view = new WelcomeIndex();
        $view->display();
    }

    private $pastryModel;

    public function __construct()
    {
        $this->pastryModel = new PastryModel();
    }

    // Get a list of pastries
    public function listPastries()
    {
        return $this->pastryModel->get_all_pastries();
    }

    // Add a new pastry
    public function addPastry($pastryData)
    {
        return $this->pastryModel->createPastry($pastryData);
    }

    // Update pastry details
    public function updatePastry($pastryId, $pastryData)
    {
        return $this->pastryModel->updatePastry($pastryId, $pastryData);
    }

    // Delete a pastry
    public function deletePastry($pastryId)
    {
        return $this->pastryModel->deletePastry($pastryId);
    }
}

