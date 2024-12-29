<?php return array (
  'resource' => 
  array (
    'name' => 'Rating',
  ),
  'navigation' => 
  array (
    'name' => 'Rating',
    'plural' => 'Rating',
    'group' => 
    array (
      'name' => 'Admin',
    ),
  ),
  'fields' => 
  array (
    'brand' => 
    array (
      'label' => 'Marca',
    ),
    'model' => 
    array (
      'label' => 'Modello',
    ),
    'description' => 
    array (
      'label' => 'Descrizione',
    ),
    'serial_number' => 
    array (
      'label' => 'Numero di serie',
    ),
    'inventory_number' => 
    array (
      'label' => 'Codice inventario',
    ),
    'code' => 
    array (
      'label' => 'Identificativo',
    ),
    'manufacturing_year' => 
    array (
      'label' => 'Anno di fabbricazione',
    ),
    'purchase_year' => 
    array (
      'label' => 'Anno di acquisto',
    ),
    'is_enabled' => 
    array (
      'label' => 'È attivo?',
    ),
    'asset_type' => 
    array (
      'label' => 'Tipologia',
    ),
    'area' => 
    array (
      'label' => 'Area',
    ),
    'parent' => 
    array (
      'label' => 'Asset genitore',
    ),
    'name' => 
    array (
      'label' => 'Nome',
    ),
    'is_disabled' => 
    array (
      'label' => 'is_disabled',
    ),
    'is_readonly' => 
    array (
      'label' => 'is_readonly',
    ),
    '_tpl' => 
    array (
      'label' => '_tpl',
    ),
    'ratings' => 
    array (
      'label' => 'ratings',
    ),
    'id' => 
    array (
      'label' => 'id',
    ),
    'title' => 
    array (
      'label' => 'title',
    ),
    'color' => 
    array (
      'label' => 'color',
    ),
    'rating' => 
    array (
      'label' => 'rating',
    ),
    'view' => 
    array (
      'label' => 'view',
    ),
  ),
  'actions' => 
  array (
    'enable' => 
    array (
      'cta' => 'Attiva',
    ),
    'disable' => 
    array (
      'cta' => 'Dismetti',
    ),
    'import' => 
    array (
      'row_number' => 'Riga :row',
      'fields' => 
      array (
        'import_file' => 'Seleziona un file XLS o CSV da caricare',
      ),
    ),
    'export' => 
    array (
      'filename_prefix' => 'Lista asset al',
      'columns' => 
      array (
        'brand' => 'Marca',
        'model' => 'Modello',
        'description' => 'Descrizione',
        'serial_number' => 'Numero di serie',
        'inventory_number' => 'Codice inventario',
        'code' => 'Identificativo',
        'manufacturing_year' => 'Anno di fabbricazione',
        'purchase_year' => 'Anno di acquisto',
        'is_enabled' => 'È attivo?',
        'asset_type' => 'Tipologia',
        'parent_inventory_number' => 'Codice inventario genitore',
      ),
    ),
  ),
  'widgets' => 
  array (
    'child_assets' => 'Asset figli',
  ),
  'exceptions' => 
  array (
    'mandatory_data' => '{1} Dato obbligatorio non presente|{2} 2 Dati obbligatori non presenti|{3} 3 Dati obbligatori non presenti|[4,*] Vari dati obbligatori non presenti',
  ),
);