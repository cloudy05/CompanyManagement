<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IsExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column)
    {
        $this->message = "";
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!Schema::hasTable($this->table)) {
            $this->message = "Table " . $this->table . " is not exist!";
            return false;
        }
        if (!Schema::hasColumn($this->table, $this->column)) {
            $this->message = "Table " . $this->table . " don't have column " . $this->column . "!";
            return false;
        }
        return DB::table($this->table)->where($this->column, $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
