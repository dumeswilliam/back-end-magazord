<?php
namespace Will\Project\Controller;

interface InterfaceControllerRequest {

    public function read() :void;
    
    public function create() :void;

    public function update() :void;

    public function delete() :void;

}