<?php

namespace App\Http\Controllers;

use App\Providers\DeploymentProvider;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
    //
    public function __construct(private DeploymentProvider $deploymentProvider) {
    }

    function index() {
        
        return $this->deploymentProvider->runDeployment();
    }
}
