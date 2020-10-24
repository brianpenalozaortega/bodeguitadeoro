<?php

date_default_timezone_set("America/Lima");
echo date("Y-m-d h:i G");
echo " a ";
echo date("Y").date("m").date("d").date("H").date("i").date("s").$this->session->userdata("id");