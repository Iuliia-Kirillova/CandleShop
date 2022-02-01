<?php

class Select
{
    private $what = "*";
    private $from;
    private $join;
    private $where;
    private $group;
    private $having;
    private $order;
    private $limit;

    // SELECT * FROM `$from`;

    public function __construct($from)
    {
        $this->from = $from;
    }

    public function what($what)
    {
        // ['count' => 'count(`user_id`)', 'user_id')
        $str = "";
        foreach ($what as $alias => $value) {
            if (is_numeric($alias)) {
                $str .= "$value, ";
            } else {
                $str .= "$value AS $alias, ";
            }
        }
        $str = rtrim($str,", ");
        $this->what = $str;
        return $this;
    }

    public function join($joins)
    {
        $str = "";
        foreach ($joins as $join) {
            $str .= "$join[type] JOIN $join[table] ON $join[key1] = $join[key2] ";
        }
        $this->join = $str;
        return $this;
    }

    public function where($where)
    {
        // TODO: rewrite where => ['AND'/OR/NOT', '=/>=/<=/!=/', 'values']
        // WHERE book_id == 22 AND book_is_deleted == 0;

        $this->where = $where;
        return $this;
    }

    public function group($groups)
    {
        // GROUP BY `book_id`, `genre_id`, `author_id`
        $str = "GROUP BY ";
        foreach ($groups as $group) {
            $str .= "$group, ";
        }
        $str = rtrim($str, ", ");
        $this->group = $str;
        return $this;
    }

    public function having($having)
    {
        $this->having = $having;
        return $this;
    }

    public function order($orders)
    {
        $str = "ORDER BY ";
        foreach ($orders as $order) {
            // [column => '', direction => '']
            $str .= "$order[column] $order[direction], ";
        }
        $str = rtrim($str, ", ");
        $this->order = $str;
        return $this;
    }

    public function limit($limit)
    {
        $str = "LIMIT $limit[offset], $limit[count]";
        $this->limit = $str;
        return $this;
    }

    public function build()
    {
        $str = "
                SELECT $this->what
                FROM $this->from
                $this->join
                $this->where
                $this->group
                $this->having
                $this->order
                $this->limit
            ";
        return $str;
    }
}

