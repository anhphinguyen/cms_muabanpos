<?php

function construct()
{
    load_model('index');
}

function list_product_categoryAction(){
    redirect_to("?mod=product&controller=list_product_category");
}
