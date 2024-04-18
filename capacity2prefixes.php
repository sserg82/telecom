<?php
function _capacity2prefixes_normalize($from,$to)
    {
        $from_last = mb_substr($from, -1);
        $to_last = mb_substr($to, -1);

        if ($from_last != '0') {
            while ($from_last > 0) {
                $ret[] = (string)$from;
                $from++;
                $from_last = mb_substr($from, -1);
            }
        }
        if ($to_last != '9') {
            while ($to_last < 9) {
                $ret[] = (string)$to;
                $to--;
                $to_last = mb_substr($to, -1);
            }
        }
        $from_last = mb_substr($from, -1);
        $to_last = mb_substr($to, -1);

        if ($from_last == '0' && $to_last == '9')
            return [mb_substr($from, 0, -1), mb_substr($to, 0, -1), $ret];

        return false;
    }
              
function capacity2prefixes($from,$to)
    {
        $prefixes=[];
        if (mb_strlen($from)!=mb_strlen($to))
            return false;
        if (empty($from) || empty($to))
            return false;

        while (($to - $from) >= 9) {
            $ret = _capacity2prefixes_normalize($from, $to);
            $from = $ret[0];
            $to = $ret[1];
            if (is_array($ret[2]) && !empty($ret[2]))
                $prefixes = array_merge($prefixes,$ret[2]);
        }

        for ($i = $from; $i <= $to; $i++)
            $prefixes[] = (string)$i;

        return $prefixes;
    }

      print_r(capacity2prefixes('74951000003','74951003999');
