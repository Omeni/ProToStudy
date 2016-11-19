<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;






class CompanyController extends ControllerBase
{


    const ADR = 'company/'; // константа контроллер, для запроса по курл

    //фильтруем массив - компания-населенный пункт, по ГЕО
    protected function xrefsArrayCreate ($parent, $id, $settlement_array){
        if ($parent == 'region') {
            $result_array = array();
            $address = 'geo/settlements/id/';
            foreach ($settlement_array as $key => $value) {
                $selectSettlement = ControllerBase::curl_select($address.$value['settlement'], array('Range:0-1000'));
                if(($selectSettlement['data'][0]['region']) == $id){
                    $result_array[] = $value; 
                }
            }
            error_log( var_export('result_array', TRUE) );
            error_log( var_export($result_array, TRUE) );
            return $result_array;

        } else {
            $address = $this::ADR.'xrefs/settlement/'.$id;
            $result_array = ControllerBase::curl_select($address, array('Range:0-1000'));
            error_log( var_export('result_array', TRUE) );
            error_log( var_export($result_array['data'], TRUE) );
            if($result_array['data']){
                return $result_array['data'];    
            }else{
                return 0;
            }
            
        
        }

    }

    //пересечение массивов 
    protected function incor_array($array1, $array2, $fold){
        $new_array = array();
        if(isset($fold)){
            foreach ($array1 as $key => $value1) {
                foreach ($array2 as $key => $value2) {
                    if($value1[$fold] == $value2[$fold]){
                        $new_array[] = $value1;
                    }
                }        
            }
        }
        return $new_array;

    }

    //конструктор массива для вывода компания - населенный пункт
    protected function xrefsConstruct($result_array){
        foreach ($result_array as $key => $value) {

            $item = ControllerBase::parent_item('geo/', 'settlements', $value['settlement'], 'id');
            $result_array[$key]['ssettlement'] = $item['data'][0]['name'];

            $item = ControllerBase::parent_item('geo/', 'regions', $item['data'][0]['region'], 'id');
            $result_array[$key]['region'] = $item['data'][0]['id'];
            $result_array[$key]['sregion'] = $item['data'][0]['name'];

            $item = ControllerBase::parent_item('geo/', 'countries', $item['data'][0]['country'], 'id');
            $result_array[$key]['country'] = $item['data'][0]['id'];
            $result_array[$key]['scountry'] = $item['data'][0]['name'];

            $item = ControllerBase::parent_item($this::ADR, 'companies', $value['company'], 'id');
            $result_array[$key]['scompany'] = $item['data'][0]['name'];

            $item = ControllerBase::parent_item($this::ADR, 'types', $item['data'][0]['type'], 'id');
            $result_array[$key]['type'] = $item['data'][0]['id'];
            $result_array[$key]['stype'] = $item['data'][0]['name'];

        }
        return $result_array;
    }


    public function typesAction()
    {
        $address = $this::ADR.'types/';
        $typesList = ControllerBase::curl_select($address);
        $this->view->typesList = $typesList;
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }


    public function companiesAction()
    {
    	$address = $this::ADR.'companies/';
        $companiesList = ControllerBase::curl_select($address);

        foreach ($companiesList['data'] as $key => $value) {
            $typeItem = ControllerBase::parent_item($this::ADR, 'types', $value['type'],'id');
            $companiesList['data'][$key]['stype'] = $typeItem['data'][0]['name'];
        }

        $typesList = ControllerBase::curl_select($this::ADR.'types/');
        $this->view->typesList = $typesList;
        $this->view->companiesList = $companiesList;
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
    

    //связь населенный пункт - Компания
    public function xrefsAction()
    {
        $address = 'geo/countries/';
        $countryList = ControllerBase::curl_select($address);
        $this->view->countryList = $countryList;

        $typesList = ControllerBase::curl_select($this::ADR.'types/');
        $this->view->typesList = $typesList;

        $address = $this::ADR . 'companies/';
        $companiesList = ControllerBase::curl_select($address);
        $this->view->companiesList = $companiesList;

        $address = $this::ADR . 'xrefs/';
        $xrefsList = ControllerBase::curl_select($address);
        $xrefsList = $this::xrefsConstruct($xrefsList['data']);
        error_log( var_export($xrefsList, TRUE) );
        $this->view->xrefsList = $xrefsList;

        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }


    //подразделения 
    public function unitsAction()
    {

        $address = 'geo/countries/';
        $countryList = ControllerBase::curl_select($address);
        $this->view->countryList = $countryList;

        $typesList = ControllerBase::curl_select($this::ADR.'types/');
        foreach ($typesList['data'] as $key => $value) {
            $types[$value['id']] = $value['name'];
        }

        $address = $this::ADR . 'companies/';
        $companiesList = ControllerBase::curl_select($address);
        foreach ($companiesList['data'] as $key => $value) {
            $companiesList['data'][$key]['name'] = $types[$value['type']].' "'.$value['name'].'"';
        }
        $this->view->companiesList = $companiesList;
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    //Фильтр для подразделений
    public function selectUnits($geo = 0, $company = 0, $str = 0){
        if($geo || $company){

            if($geo != 0){
                $header[] = 'X-HTTP-Filter-EQ-settlement:'. $geo;
            }

            if($company != 0){
                $header[] = 'X-HTTP-Filter-EQ-company:'. $company;   
            }

            if($str){
                    $header[] = 'X-HTTP-Filter-Like-name:'. $str;
            }

            $typesList = ControllerBase::curl_select($this::ADR.'types/');

            foreach ($typesList['data'] as $key => $value) {
                $types[$value['id']] = $value['name'];
            }

            $address = 'unit/units/';
            $List = ControllerBase::curl_select($address, $header);
            foreach ($List['data'] as $key => $value) {

                $item = ControllerBase::parent_item('geo/', 'settlements', $value['settlement'], 'id');
                $List['data'][$key]['ssettlement'] = $item['data'][0]['name'];

                $item = ControllerBase::parent_item('geo/', 'regions', $item['data'][0]['region'], 'id');
                $List['data'][$key]['region'] = $item['data'][0]['id'];
                $List['data'][$key]['sregion'] = $item['data'][0]['name'];

                $item = ControllerBase::parent_item('geo/', 'countries', $item['data'][0]['country'], 'id');
                $List['data'][$key]['country'] = $item['data'][0]['id'];
                $List['data'][$key]['scountry'] = $item['data'][0]['name'];

                $item = ControllerBase::parent_item($this::ADR, 'companies', $value['company'], 'id');
                $List['data'][$key]['scompany'] = $types[$item['data'][0]['type']]. ' "' . $item['data'][0]['name'].'"';

            }
            return $List;

        }
    }

   
    public function selectlistAction($cont, $parent, $id, $range = 0)
    {

            $range = (int)$range;
            if (isset($_POST["str"])){
                $str = $_POST["str"]; 
            } else {
                $str = 0; 
            }

    		if ($cont == "companies"){

                $address = $this::ADR.'/'.$cont.'/';

                if (isset($_POST["select"])){

                    $select = $_POST["select"];
                    $header[] = 'X-HTTP-Filter-EQ-type:'. $select;

                }

                if ($str){
                    $header[] = 'X-HTTP-Filter-Like-name:'. $str;
                    error_log( var_export('str --'.$str, TRUE) );
                }

                $List = ControllerBase::curl_select($address, $header);

                foreach ($List['data'] as $key => $value) {
                    $address = $this::ADR.'types/id/'.$value['type'];
                    $typeItem = ControllerBase::curl_select($address);
                    $List['data'][$key]['stype'] = $typeItem['data'][0]['name'];
                }

    		} else if ($cont == "units"){
                $company = $_POST["select"];
                $geo = $id;
                $List = $this::selectUnits($geo, $company, $str);
            }

            $this->view->range = $range;
	        $this->view->cont = $cont;
	        $this->view->List = $List;
	        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        
    }



   
    public function filterxrefsAction($geo = 0, $geoid = 0, $type = 0, $company = 0)
    {

            $geoid = (int)$geoid; //переводим в инт ид выбранного региона или населенного пункта
            $company = (int)$company; //переводим в инт ид выбранной компании или или типа ответственности
            $ListGeo = array(); //объявляем массив в который позже будем добовлять записи полученные при фильтре по гео
            $ListCompany = array(); // объявляем массив в который позже будем добовлять записи полученные при фильтре по компании и типу 
            $address = $this::ADR . 'xrefs/'; //адрес до текщуй таблицыы
            $geo = substr($geo, 0, -1); //обрезаем строку гео бля запроса
            $List = ControllerBase::curl_select($address, array('Range:0-1000')); // по умолчанию будем выводить весь список компаний, у нас их не так много
            $List = $List['data'];
            error_log( var_export('geo --'.$geo, TRUE) );
            error_log( var_export('geoid --'.$geoid, TRUE) );

            if ($geoid != 0){ // если в фильтре ГЕО что-то есть собираем делаем зпрос по гео
                $FilterList = $this::xrefsArrayCreate ( $geo, $geoid, $List); // тут получим результат запроса по гео
                if ($FilterList != 0){ // если он что-то нашел, сохроняем его
                        $ListGeo = $FilterList;
                        $List = $ListGeo;
                } else {
                    $List = array();
                    $geoid = 0;
                }
                
            }
            
            error_log( var_export('type --'.$type, TRUE) );
            error_log( var_export('company --'.$company, TRUE) );
            if ($company != 0){ // проверяем выбрана ли компнаия или тип компании
                error_log( var_export('type --'.$type, TRUE) );
                if ($type == 'companies'){
                    $ListCompany = ControllerBase::curl_select($address.'company/'.$company, array('Range:0-1000'));
                } else {
                    $ListToType = ControllerBase::curl_select($this::ADR.'companies/type/'.$company, array('Range:0-1000'));
                    foreach ($ListToType['data'] as $value) {
                        error_log( var_export('$$$$$$$$'.$address.'company/'.$value['id'], TRUE) );
                        $FilterList = ControllerBase::curl_select($address.'company/'.$value['id'], array('Range:0-1000'));
                        if (isset($FilterList['data'])) {
                            $ListCompany = array_merge($ListCompany, $FilterList);
                        }
                    }
                    error_log( var_export($ListCompany, TRUE) );
                }

                if (isset($ListCompany['data'])){
                    $ListCompany = $ListCompany['data'];
                    $List = $ListCompany;  
                } else {
                    $ListCompany = array();
                    $List = array();
                    $company = 0;
                }
                
                
            }


            if($geoid != 0 && $company != 0){

                error_log( var_export('ListGeo$$$$', TRUE) );
                error_log( var_export($ListGeo, TRUE) );
                error_log( var_export('ListCompany$$$$', TRUE) );
                error_log( var_export($ListCompany, TRUE) );
                $List = $this::incor_array($ListGeo, $ListCompany, 'id');
                error_log( var_export($List, TRUE) );

            }
            $List = $this::xrefsConstruct($List);// преобразуем в конечный массив для вывода            
            //$header = array('X-HTTP-Filter-Like-name:'. $str);
            $this->view->List = $List;
            $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        
    }


    public function xrefsfixedAction(){
        if (isset($_POST["geo"]) && isset($_POST["company"])){
            $address = $this::ADR.'xrefs/';
            $geo = $_POST["geo"];
            $company = $_POST["company"];
            $edit = 'settlement='.$geo.'&company='.$company;
            $List = ControllerBase::curl_insert($address, $edit);
            $this->view->List = $List;
            $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        }
    }

    public function editAction()
    {		
    	if(isset($_POST["type"])){
    		$type = $_POST["type"];
    		$cont = $_POST["cont"];
    		$name = $_POST["name"];
    		$id = (int)$_POST["id"];
    		$parent = $_POST["parent"];
    		$pid = $_POST["pid"];

    		$address = $this::ADR.$cont.'/';
			$edit = 'name='.$name;

            if($cont == 'units' && isset($_POST["geo"]) && isset($_POST["company"])){

                $geo = (int)$_POST["geo"];
                $company = (int)$_POST["company"];
                error_log( var_export('&settlement='.$geo.'&company='.$company, TRUE) );
                $edit .= '&settlement='.$geo.'&company='.$company; 
                $address = 'unit/units/';
            } elseif(!empty($parent)){

                error_log( var_export('parent --'.$parent, TRUE) );
                $edit .= '&'. substr($parent, 0, -1) .'='. $pid;
            }
			if($id > 0){
				$address .= $id;
			}
			error_log( var_export($edit, TRUE) );
			if($type == 0){
				$List = ControllerBase::curl_insert($address, $edit);
			} elseif ($type == 1) {
				$List = ControllerBase::curl_update($address, $edit);
			}
    		  
            print json_encode($List, TRUE);
            $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    	}
    		
        
    }


    public function deleteAction()
    {		
    	if(isset($_POST["cont"])){
    		$cont = $_POST["cont"];
    		$id = $_POST["id"];
    		$address = $this::ADR.$cont.'/'.$id;
            if($cont == "units"){
                $address = 'unit/units/'.$id;
            }
			$List = ControllerBase::curl_delete($address);
            print json_encode($List, TRUE);
            $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
    	}
    		
        
    }


    //открываем форму изменения добавления
    public function formAction()
    {
    	if(isset($_GET["id"])){
    		$id = $_GET["id"];
    		$type = $_GET["type"];
    		$cont = $_GET["cont"];
			$this->view->id = $id;
			$this->view->type = $type;
			$this->view->cont = $cont;
    		if ($type > 0)
    		{
    			switch ($cont) {
    				case 'companies':
                        $address = $this::ADR.'types/';
                        $typesList = ControllerBase::curl_select($address);
                        $this->view->typesList = $typesList;
    					$address = $this::ADR.$cont.'/id/'.$id;
	        			$item = ControllerBase::curl_select($address);
	        			error_log( var_export($item, TRUE) );
						$this->view->item = $item;
    					break;
                    case 'units':
                        $address = 'unit/units/id/'.$id;
                        $item = ControllerBase::curl_select($address);
                        error_log( var_export($item, TRUE) );
                        $this->view->item = $item;
                        break;

    			}
    		}
    		else{
    			switch ($cont) {
					case 'companies':
	        			$address = $this::ADR.'types/';
                        $typesList = ControllerBase::curl_select($address);
                        $this->view->typesList = $typesList;
    					break;
					

    			}
    		}

			$this->view->type = $type;
	        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    	}
        
    }


}
