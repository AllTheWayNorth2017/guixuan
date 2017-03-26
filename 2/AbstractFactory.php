<?php

class OS
{
    protected function useOS() {
        echo "operating system";
    }
}

class Boot
{
    protected function useBoot() {
        echo "basic input/output system";
    }
}

class MacOS extends OS { echo "OS:Mac OS X";}
class WinOS extends OS { echo "OS:Windows";}
class MacBoot extends Boot{ echo "EIF";}
class WinBoot extends Boot{ echo "BIOS";}

interface AbstractFactory
{
    public function CreateOS();
    public function CreateBoot();
}

class MacFactory implements AbstractFactory
{
    public function CreateOS() {
        return new MacOS();
    }
    public function CreateBoot() {
        return new MacBoot();
    }
}

class WinFactory implements AbstractFactory
{
    public function CreateOS() {
        return new WinOS();
    }
    public function CreateBoot() {
        return new WinBoot();
    }
}

