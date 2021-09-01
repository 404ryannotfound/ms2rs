<?php

function HookMs2rsAllInitialise()
    {
    global $ms2rs_fieldvars;
    config_register_core_fieldvars("ms2rs plugin",$ms2rs_fieldvars);
    }