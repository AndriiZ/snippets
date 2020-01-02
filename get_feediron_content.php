        function get_content($link)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

            $headers = array();
            $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0';
            $headers[] = 'Accept: text/html';
            $headers[] = 'Accept-Language: uk';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            if (defined('_HTTP_PROXY')) {
              curl_setopt($ch, CURLOPT_PROXY, _HTTP_PROXY);
            }

            curl_setopt($ch, CURLOPT_MAXREDIRS, 20);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
              $result = 'Error:' . curl_error($ch);
            }

            $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            curl_close($ch);
            return array( $result,  $content_type);
  }
