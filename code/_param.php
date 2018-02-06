<?        
        $protocol_1 = 'https://';
        $protocol_2 = 'http://';
        $active_node_1 = '';
        $active_node_2 = '';
        $cat  = ':5001/api/v0/cat/';
        $stat = ':5001/api/v0/object/stat/';
        $hash = @file_get_contents($protocol_1.$active_node_1.$cat.$var.'');
        $inf  = @file_get_contents($protocol_1.$active_node_1.$stat.$var.'');
        $var1 = '<date class="date '.date("d/m/Y").'" id="'.date("d/m/Y").'">'.date("d/m/Y").'</date>';
        $var2 = '<time class="time '.date("H:i:s").'" id="'.date("H:i:s").'">'.date("H:i:s").'</time>';
