//可以对数组进行目录树操作
    function genTree9($lists) {
        $tree = array(); //格式化好的树
        $items = array();
        for ($i=0; $i < count($lists); $i++) { 
            $items[$i +1] = $lists[$i];
        }
        foreach ($items as $key=>$item)
            // dd($item);
            if (isset($items[$item['parent_id']])){
                $items[$item['parent_id']]['son'][] = &$items[$item['id']];
            }
            else{
                $tree[] = &$items[$item['id']];
            }
            // dd($items);
        return $tree;
    }   
        public $items = array(
        1 => array('id' => 1, 'pid' => 0, 'name' => '江西省'),
        2 => array('id' => 2, 'pid' => 0, 'name' => '黑龙江省'),
        3 => array('id' => 3, 'pid' => 1, 'name' => '南昌市'),
        4 => array('id' => 4, 'pid' => 2, 'name' => '哈尔滨市'),
        5 => array('id' => 5, 'pid' => 2, 'name' => '鸡西市'),
        6 => array('id' => 6, 'pid' => 4, 'name' => '香坊区'),
        7 => array('id' => 7, 'pid' => 4, 'name' => '南岗区'),
        8 => array('id' => 8, 'pid' => 6, 'name' => '和兴路'),
        9 => array('id' => 9, 'pid' => 7, 'name' => '西大直街'),
        10 => array('id' => 10, 'pid' => 8, 'name' => '东北林业大学'),
        11 => array('id' => 11, 'pid' => 9, 'name' => '哈尔滨工业大学'),
        12 => array('id' => 12, 'pid' => 8, 'name' => '哈尔滨师范大学'),
        13 => array('id' => 13, 'pid' => 1, 'name' => '赣州市'),
        14 => array('id' => 14, 'pid' => 13, 'name' => '赣县'),
        15 => array('id' => 15, 'pid' => 13, 'name' => '于都县'),
        16 => array('id' => 16, 'pid' => 14, 'name' => '茅店镇'),
        17 => array('id' => 17, 'pid' => 14, 'name' => '大田乡'),
        18 => array('id' => 18, 'pid' => 16, 'name' => '义源村'),
        19 => array('id' => 19, 'pid' => 16, 'name' => '上坝村'),
    );


    //原创
            $products = Product::where('depository', config('luster.default_storehouse'))->where('id' , $request->input('number'))->get();
        foreach ($products as $product) {
            $i = 1;
            $mrp[$i]['id']         = $i;
            $mrp[$i]['product_id'] = $product->id;
            $mrp[$i]['number']     = $product->number;
            $mrp[$i]['name']       = $product->name;
            $mrp[$i]['total']      = $product->total;
            $mrp[$i]['need']       = $request->input('quantity') ;
            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
            $mrp[$i]['unit']       = $product->unit;
            $mrp[$i]['type']       = $product->type;
            $mrp[$i]['depository'] = $product->depository; 
            $unit = $product->unit;;
            $parentneed = abs($mrp[$i]['excess']); 
            if ($mrp[$i]['excess'] >= 0) {
                $i++;
                continue;
            }
            $i++;
            $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
            if (!empty($products)) {
                $pneed1 = $parentneed;
                foreach ($products as $product) {
                    $mrp[$i]['id']         = $i;
                    $mrp[$i]['product_id'] = $product->id; 
                    $mrp[$i]['number']     = $product->number;
                    $mrp[$i]['name']       = $product->name;
                    $mrp[$i]['total']      = $product->total;
                    $mrp[$i]['need']       = $pneed1 * $product->factor;
                    $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                    $mrp[$i]['unit']       = $product->unit;
                    $mrp[$i]['type']       = $product->type;
                    $mrp[$i]['depository'] = $product->depository;
                    $parentneed = abs($mrp[$i]['excess']);
                    if ($mrp[$i]['excess'] >= 0) {
                        $i++;
                        continue;
                    }
                    $i++;
                    $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                    if (!empty($products)) {
                        $pneed2 = $parentneed;
                        foreach ($products as $product) {
                            $mrp[$i]['id']         = $i;
                            $mrp[$i]['product_id'] = $product->id; 
                            $mrp[$i]['number']     = $product->number;
                            $mrp[$i]['name']       = $product->name;
                            $mrp[$i]['total']      = $product->total;
                            $mrp[$i]['need']       = $pneed2 * $product->factor;
                            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                            $mrp[$i]['unit']       = $product->unit;
                            $mrp[$i]['type']       = $product->type;
                            $mrp[$i]['depository'] = $product->depository;
                            $parentneed = abs($mrp[$i]['excess']);
                            if ($mrp[$i]['excess'] >= 0) {
                                $i++;
                                continue;
                            }
                            $i++;
                            $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                            if (!empty($products)) {
                                $pneed3 = $parentneed;
                                foreach ($products as $product) {
                                    $mrp[$i]['id']         = $i;
                                    $mrp[$i]['product_id'] = $product->id; 
                                    $mrp[$i]['number']     = $product->number;
                                    $mrp[$i]['name']       = $product->name;
                                    $mrp[$i]['total']      = $product->total;
                                    $mrp[$i]['need']       = $pneed3 * $product->factor;
                                    $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                    $mrp[$i]['unit']       = $product->unit;
                                    $mrp[$i]['type']       = $product->type;
                                    $mrp[$i]['depository'] = $product->depository;
                                    $parentneed = abs($mrp[$i]['excess']);
                                    if ($mrp[$i]['excess'] >= 0) {
                                        $i++;
                                        continue;
                                    }
                                    $i++;
                                    $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                    if (!empty($products)) {
                                        $pneed4 = $parentneed;
                                        foreach ($products as $product) {
                                            $mrp[$i]['id']         = $i;
                                            $mrp[$i]['product_id'] = $product->id; 
                                            $mrp[$i]['number']     = $product->number;
                                            $mrp[$i]['name']       = $product->name;
                                            $mrp[$i]['total']      = $product->total;
                                            $mrp[$i]['need']       = $pneed4 * $product->factor;
                                            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                            $mrp[$i]['unit']       = $product->unit;
                                            $mrp[$i]['type']       = $product->type;
                                            $mrp[$i]['depository'] = $product->depository;
                                            $parentneed = abs($mrp[$i]['excess']);
                                            if ($mrp[$i]['excess'] >= 0) {
                                                $i++;
                                                continue;
                                            }
                                            $i++;
                                            $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                            if (!empty($products)) {
                                                $pneed5 = $parentneed;
                                                foreach ($products as $product) {
                                                    $mrp[$i]['id']         = $i;
                                                    $mrp[$i]['product_id'] = $product->id; 
                                                    $mrp[$i]['number']     = $product->number;
                                                    $mrp[$i]['name']       = $product->name;
                                                    $mrp[$i]['total']      = $product->total;
                                                    $mrp[$i]['need']       = $pneed5 * $product->factor;
                                                    $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                                    $mrp[$i]['unit']       = $product->unit;
                                                    $mrp[$i]['type']       = $product->type;
                                                    $mrp[$i]['depository'] = $product->depository;
                                                    $parentneed = abs($mrp[$i]['excess']);
                                                    if ($mrp[$i]['excess'] >= 0) {
                                                        $i++;
                                                        continue;
                                                    }
                                                    $i++;
                                                    $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                                    if (!empty($products)) {
                                                        $pneed6 = $parentneed;
                                                        foreach ($products as $product) {
                                                            $mrp[$i]['id']         = $i;
                                                            $mrp[$i]['product_id'] = $product->id; 
                                                            $mrp[$i]['number']     = $product->number;
                                                            $mrp[$i]['name']       = $product->name;
                                                            $mrp[$i]['total']      = $product->total;
                                                            $mrp[$i]['need']       = $pneed6 * $product->factor;
                                                            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                                            $mrp[$i]['unit']       = $product->unit;
                                                            $mrp[$i]['type']       = $product->type;
                                                            $mrp[$i]['depository'] = $product->depository;
                                                            $parentneed = abs($mrp[$i]['excess']);
                                                            if ($mrp[$i]['excess'] >= 0) {
                                                                $i++;
                                                                continue;
                                                            }
                                                            $i++;
                                                            $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                                            if (!empty($products)) {
                                                                $pneed7 = $parentneed;
                                                                foreach ($products as $product) {
                                                                    $mrp[$i]['id']         = $i;
                                                                    $mrp[$i]['product_id'] = $product->id; 
                                                                    $mrp[$i]['number']     = $product->number;
                                                                    $mrp[$i]['name']       = $product->name;
                                                                    $mrp[$i]['total']      = $product->total;
                                                                    $mrp[$i]['need']       = $pneed7 * $product->factor;
                                                                    $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                                                    $mrp[$i]['unit']       = $product->unit;
                                                                    $mrp[$i]['type']       = $product->type;
                                                                    $mrp[$i]['depository'] = $product->depository;
                                                                    $parentneed = abs($mrp[$i]['excess']);
                                                                    if ($mrp[$i]['excess'] >= 0) {
                                                                        $i++;
                                                                        continue;
                                                                    }
                                                                    $i++;
                                                                    $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                                                    if (!empty($products)) {
                                                                        $pneed8 = $parentneed;
                                                                        foreach ($products as $product) {
                                                                            $mrp[$i]['id']         = $i;
                                                                            $mrp[$i]['product_id'] = $product->id; 
                                                                            $mrp[$i]['number']     = $product->number;
                                                                            $mrp[$i]['name']       = $product->name;
                                                                            $mrp[$i]['total']      = $product->total;
                                                                            $mrp[$i]['need']       = $pneed8 * $product->factor;
                                                                            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                                                            $mrp[$i]['unit']       = $product->unit;
                                                                            $mrp[$i]['type']       = $product->type;
                                                                            $mrp[$i]['depository'] = $product->depository;
                                                                            $parentneed = abs($mrp[$i]['excess']);
                                                                            if ($mrp[$i]['excess'] >= 0) {
                                                                                $i++;
                                                                                continue;
                                                                            }
                                                                            $i++;
                                                                            $products = Product::where('depository', config('luster.default_storehouse'))->where('parent_id' , $product->id)->get();
                                                                            if (!empty($products)) {
                                                                                $pneed9 = $parentneed;
                                                                                foreach ($products as $product) {
                                                                                    $mrp[$i]['id']         = $i;
                                                                                    $mrp[$i]['product_id'] = $product->id; 
                                                                                    $mrp[$i]['number']     = $product->number;
                                                                                    $mrp[$i]['name']       = $product->name;
                                                                                    $mrp[$i]['total']      = $product->total;
                                                                                    $mrp[$i]['need']       = $pneed9 * $product->factor;
                                                                                    $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
                                                                                    $mrp[$i]['unit']       = $product->unit;
                                                                                    $mrp[$i]['type']       = $product->type;
                                                                                    $mrp[$i]['depository'] = $product->depository;
                                                                                    $parentneed = abs($mrp[$i]['excess']);
                                                                                    if ($mrp[$i]['excess'] >= 0) {
                                                                                        $i++;
                                                                                        continue;
                                                                                    }
                                                                                    $i++;
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
