<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("CREATE_CATALOG");



create_catalog_iblock();


   function create_property($arFields)
   {
     $ibp = new CIBlockProperty;
     $propId = $ibp->Add($arFields);
         if ($propId > 0)
         {
            $arFields["ID"] = $propId;
            $arCommonProps[$arFields["CODE"]] = $arFields;
            echo "&mdash; Добавлено свойство ".$arFields["NAME"]."<br />";
         }
         else
            echo "&mdash; Ошибка добавления свойства ".$arFields["NAME"]."<br />";
   }



   function create_catalog_iblock()
   {
      $ib = new CIBlock;

      $IBLOCK_TYPE = "s1"; // Тип инфоблока
      $SITE_ID = "s1"; // ID сайта
	   $IBLOCK_TYPE = "catalog";

      //===================================//
      // Создаем инфоблок каталога товаров //
      //===================================//

         $arFields = Array(
            "ACTIVE" => "Y",
            "NAME" => "Аккумуляторы",
            "CODE" => "catalog",
            "IBLOCK_TYPE_ID" => $IBLOCK_TYPE, //catalog
            "SITE_ID" => $SITE_ID,            //s1
            "SORT" => "5",
		      "GROUP_ID" => Array("1"=>"X", "2"=>"D", "3"=>"R"),
            "FIELDS" => array(
               "DETAIL_PICTURE" => array(
                  "IS_REQUIRED" => "N", // не обязательное
                  "DEFAULT_VALUE" => array(
                     "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                     "WIDTH" => "600", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                     "HEIGHT" => "600", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                     "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                     "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                     "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
                  ),
               ),
               "PREVIEW_PICTURE" => array(
                  "IS_REQUIRED" => "N", // не обязательное
                  "DEFAULT_VALUE" => array(
                     "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                     "WIDTH" => "140", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                     "HEIGHT" => "140", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                     "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                     "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                     "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
                     "FROM_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость генерации картинки предварительного просмотра из детальной. 
                     "DELETE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость удаления картинки предварительного просмотра при удалении детальной.
                     "UPDATE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость обновления картинки предварительного просмотра при изменении детальной.
                  ),
               ),
               "SECTION_PICTURE" => array(
                  "IS_REQUIRED" => "N", // не обязательное
                  "DEFAULT_VALUE" => array(
                     "SCALE" => "Y", // возможные значения: Y|N. Если равно "Y", то изображение будет отмасштабировано. 
                     "WIDTH" => "235", // целое число. Размер картинки будет изменен таким образом, что ее ширина не будет превышать значения этого поля. 
                     "HEIGHT" => "235", // целое число. Размер картинки будет изменен таким образом, что ее высота не будет превышать значения этого поля.
                     "IGNORE_ERRORS" => "Y", // возможные значения: Y|N. Если во время изменения размера картинки были ошибки, то при значении "N" будет сгенерирована ошибка. 
                     "METHOD" => "resample", // возможные значения: resample или пусто. Значение поля равное "resample" приведет к использованию функции масштабирования imagecopyresampled, а не imagecopyresized. Это более качественный метод, но требует больше серверных ресурсов. 
                     "COMPRESSION" => "95", // целое от 0 до 100. Если значение больше 0, то для изображений jpeg оно будет использовано как параметр компрессии. 100 соответствует наилучшему качеству при большем размере файла.
                     "FROM_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость генерации картинки предварительного просмотра из детальной. 
                     "DELETE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость удаления картинки предварительного просмотра при удалении детальной.
                     "UPDATE_WITH_DETAIL" => "Y", // возможные значения: Y|N. Указывает на необходимость обновления картинки предварительного просмотра при изменении детальной.
                  ),
               ),
               // Символьный код элементов
               "CODE" => array(
                  "IS_REQUIRED" => "Y", // Обязательное
                  "DEFAULT_VALUE" => array(
                     "UNIQUE" => "Y", // Проверять на уникальность
                     "TRANSLITERATION" => "Y", // Транслитерировать
                     "TRANS_LEN" => "30", // Максмальная длина транслитерации
                     "TRANS_CASE" => "L", // Приводить к нижнему регистру
                     "TRANS_SPACE" => "-", // Символы для замены
                     "TRANS_OTHER" => "-",
                     "TRANS_EAT" => "Y",
                     "USE_GOOGLE" => "N",
                  ),
               ),
               // Символьный код разделов
               "SECTION_CODE" => array(
                  "IS_REQUIRED" => "Y",
                  "DEFAULT_VALUE" => array(
                     "UNIQUE" => "Y",
                     "TRANSLITERATION" => "Y",
                     "TRANS_LEN" => "30",
                     "TRANS_CASE" => "L",
                     "TRANS_SPACE" => "-",
                     "TRANS_OTHER" => "-",
                     "TRANS_EAT" => "Y",
                     "USE_GOOGLE" => "N",
                  ),
               ),
               "DETAIL_TEXT_TYPE" => array(      // Тип детального описания
                  "DEFAULT_VALUE" => "html",
               ),
               "SECTION_DESCRIPTION_TYPE" => array(
                  "DEFAULT_VALUE" => "html",
               ),
               "IBLOCK_SECTION" => array(         // Привязка к разделам обязательноа
                  "IS_REQUIRED" => "Y",
               ),            
               "LOG_SECTION_ADD" => array("IS_REQUIRED" => "Y"), // Журналирование
               "LOG_SECTION_EDIT" => array("IS_REQUIRED" => "Y"),
               "LOG_SECTION_DELETE" => array("IS_REQUIRED" => "Y"),
               "LOG_ELEMENT_ADD" => array("IS_REQUIRED" => "Y"),
               "LOG_ELEMENT_EDIT" => array("IS_REQUIRED" => "Y"),
               "LOG_ELEMENT_DELETE" => array("IS_REQUIRED" => "Y"),
            ),// END OF FIELDS
         



            // Шаблоны страниц
            "LIST_PAGE_URL" => "#SITE_DIR#/catalog/",
            "SECTION_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
            "DETAIL_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",         

            "INDEX_SECTION" => "Y", // Индексировать разделы для модуля поиска
            "INDEX_ELEMENT" => "Y", // Индексировать элементы для модуля поиска

            "VERSION" => 1, // Хранение элементов в общей таблице

            "ELEMENT_NAME" => "Товар",
            "ELEMENTS_NAME" => "Товары",
            "ELEMENT_ADD" => "Добавить товар",
            "ELEMENT_EDIT" => "Изменить товар",
            "ELEMENT_DELETE" => "Удалить товар",
            "SECTION_NAME" => "Категории",
            "SECTIONS_NAME" => "Категория",
            "SECTION_ADD" => "Добавить категорию",
            "SECTION_EDIT" => "Изменить категорию",
            "SECTION_DELETE" => "Удалить категорию",

            "SECTION_PROPERTY" => "Y", // Разделы каталога имеют свои свойства (нужно для модуля интернет-магазина)
         ); // END OF arFields




      $ID = $ib->Add($arFields);
      if ($ID > 0)
      {
         echo "&mdash; инфоблок \"Каталог товаров\" успешно создан<br />";
      }
      else
      {
		   echo 'Error: '.'ошибка создания инфоблока '.$ib->LAST_ERROR.'<br>';
         return false;
      }






      //=============================================//
      // Добавляем свойства к каталогу аккумуляторов //
      //=============================================//

      // Определяем, есть ли у инфоблока свойства
      $dbProperties = CIBlockProperty::GetList(array(), array("IBLOCK_ID"=>$ID));
      if ($dbProperties->SelectedRowsCount() <= 0)
      {
         $ibp = new CIBlockProperty;



         //=======================================//
         // Добавляем Оригинальный код            //
         //=======================================//
         $arFields = Array(
            "NAME" => "Оригинальный код",
            "ACTIVE" => "Y",
            "SORT" => 100, // Сортировка
            "CODE" => "ORIGINALNYY_KOD",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ),
            "IBLOCK_ID" => $ID
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Комплектация                //
         //=======================================//
         $arFields = Array(
            "NAME" => "Комплектация",
            "ACTIVE" => "Y",
            "SORT" => 200,
            "CODE" => "KOMPLEKTATSIYA",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID,    
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Тип элемента                //
         //=======================================//
         $arFields = Array(
            "NAME" => "Тип элемента",
            "ACTIVE" => "Y",
            "SORT" => 300,
            "CODE" => "TIP_ELEMENTA",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID,  
         );
         create_property($arFields);


         //=======================================//
         // Добавляем Напряжение, V               //
         //=======================================//
         $arFields = Array(
            "NAME" => "Напряжение, V",
            "ACTIVE" => "Y",
            "SORT" => 400,
            "CODE" => "NAPRYAZHENIE_V",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID, 
         );
         create_property($arFields);

         //=======================================//
         // Добавляем ШтрихКод                    //
         //=======================================//
         $arFields = Array(
            "NAME" => "ШтрихКод",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "CML2_BAR_CODE",
            "PROPERTY_TYPE" => "S", // Строка
            "ROW_COUNT" => 1, // Количество строк
            "COL_COUNT" => 0, // Количество столбцов
            "IBLOCK_ID" => $ID,
         );
         create_property($arFields);


         //=======================================//
         // Добавляем Артикул                     //
         //=======================================//
         $arFields = Array(
            "NAME" => "Артикул",
            "ACTIVE" => "Y",
            "SORT" => 50,
            "CODE" => "CML2_ARTICLE",
            "PROPERTY_TYPE" => "S", // Строка
            "ROW_COUNT" => 1, // Количество строк
            "COL_COUNT" => 0, // Количество столбцов
            "IBLOCK_ID" => $ID,
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Реквизиты                   //
         //=======================================//
         $arFields = Array(
            "NAME" => "Реквизиты",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "CML2_TRAITS",
            "PROPERTY_TYPE" => "S", // Строка
            "ROW_COUNT" => 6, // Количество строк
            "COL_COUNT" => 2, // Количество столбцов
            "IBLOCK_ID" => $ID,
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Базовая единица             //
         //=======================================//
         $arFields = Array(
            "NAME" => "Базовая единица",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "CML2_BASE_UNIT",
            "PROPERTY_TYPE" => "S", // Строка
            "ROW_COUNT" => 1, // Количество строк
            "COL_COUNT" => 0, // Количество столбцов
            "IBLOCK_ID" => $ID,
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Картинки                    //
         //=======================================//
         $arFields = Array(
            "NAME" => "Картинки",
            "ACTIVE" => "Y",
            "MULTIPLE" => "Y",
            "SORT" => 500,
            "CODE" => "MORE_PHOTO",
            "PROPERTY_TYPE" => "F", // Файл
            "FILE_TYPE" => "jpg, gif, bmp, png, jpeg",   
            "IBLOCK_ID" => $ID,
            "HINT" => "Допускается произвольное число дополнительных фотографий. Добавьте одну, и появится поле для добавленя следующей.",
         );

         //=======================================//
         // Добавляем Емкость, mAh                //
         //=======================================//
         $arFields = Array(
            "NAME" => "Емкость, mAh",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "EMKOST_MAH",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID, 
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Мощность, Wh                //
         //=======================================//
         $arFields = Array(
            "NAME" => "Мощность, Wh",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "MOSHCHNOST_WH",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID, 
         );
         create_property($arFields);

         //=======================================//
         // Добавляем Тип упаковки                //
         //=======================================//
         $arFields = Array(
            "NAME" => "Тип упаковки",
            "ACTIVE" => "Y",
            "SORT" => 500,
            "CODE" => "TIP_UPAKOVKI",
            "PROPERTY_TYPE" => "L", // Список
            "LIST_TYPE" => "C", // Тип списка - "флажки"
            "FILTRABLE" => "Y", // Выводить на странице списка элементов поле для фильтрации по этому свойству
            "VALUES" => array(
               "VALUE" => "да",
            ), 
            "IBLOCK_ID" => $ID, 
         );
         create_property($arFields);

      }
      else
          echo "&mdash; Для данного инфоблока уже существуют свойства<br />";      






      //===================//
      // Свойства разделов //
      //===================//

      $obUserType = new CUserTypeEntity();


      //=======================================//
      // Добавляем UF_ARTICLE                  //
      //=======================================//
      $fieldTitle = "UF_ARTICLE ";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_ARTICLE ",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N",   // Множественное
         "MANDATORY" => "N",  // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "1" // высота поля ввода
          ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);


      //=======================================//
      // Добавляем UF_BATTERYTYPE              //
      //=======================================//
      $fieldTitle = "UF_BATTERYTYPE";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_BATTERYTYPE",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);




      //=======================================//
      // Добавляем UF_DEVTYPE              	   //
      //=======================================//
      $fieldTitle = "UF_DEVTYPE";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_DEVTYPE",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);


      //=======================================//
      // Добавляем UF_MODEL              	   //
      //=======================================//
      $fieldTitle = "UF_MODEL";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_MODEL",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);
      

      //=======================================//
      // Добавляем UF_PRDDATE              	   //
      //=======================================//
      $fieldTitle = "UF_PRDDATE";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_PRDDATE",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
            ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);



      //=======================================//
      // Добавляем  UF_PRODUCER                //
      //=======================================//
      $fieldTitle = "UF_PRODUCER";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_PRODUCER",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
          ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);
   

      //=======================================//
      // Добавляем  UF_COMPATIBILITYLIST       //
      //=======================================//
      $fieldTitle = "UF_COMPATIBILITYLIST";
      $arPropFields = array(
         "ENTITY_ID" => "IBLOCK_".$ID."_SECTION",
         "FIELD_NAME" => "UF_COMPATIBILITYLIST",
         "USER_TYPE_ID" => "string",
         "XML_ID" => "",
         "SORT" => 500,
         "MULTIPLE" => "N", // Множественное
         "MANDATORY" => "N", // Обязательное 
         "SHOW_FILTER" => "S",
         "SHOW_IN_LIST" => "Y",
         "EDIT_IN_LIST" => "Y",
         "IS_SEARCHABLE" => "N",
         "SETTINGS" => array(
               "SIZE" => "70", // длина поля ввода
               "ROWS" => "3" // высота поля ввода
          ),
         "EDIT_FORM_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_COLUMN_LABEL" => array("ru" => $fieldTitle, "en" => ""),
         "LIST_FILTER_LABEL" => array("ru" => $fieldTitle, "en" => ""),
      );
      $FIELD_ID = $obUserType->Add($arPropFields);



      
      // Подключаем инфоблок к модулю торгового каталога
      if (!CCatalog::GetByID($ID))
      {
         $arFields = array(
            "IBLOCK_ID" => $ID,   // код (ID) инфоблока товаров
         //   "YANDEX_EXPORT" => "Y",      // экспортировать в Яндекс.Товары с помощью агента
         );
         $boolResult = CCatalog::Add($arFields);
         if ($boolResult == false)
         {
            if ($ex = $APPLICATION->GetException())
            {
               $strError = $ex->GetString();
               ShowError($strError);
            }
         }
         else
         {
             echo "&mdash; Инфоблок №".$ID." успешно подключен к модулю торгового каталога<br />";
         }
      }   
      else
      {
         echo "&mdash; Инфоблок №".$ID." является торговым каталогом<br />";
      }
      //Возвращаем номер добавленного инфоблока
       return $ID;
   }
?>












<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>