<?php


class Validator
{
    private $data;
    private $errors = [];
    private static $fields = ['hoten', 'email', 'diachi', "dienthoai"];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                die("$field is not present in data");
            }
        }

        $this->validateFullname();
        $this->validateEmail();
        $this->validateAddress();
        $this->validateMobilenumber();

        return $this->errors;
    }

    public function validateFullname()
    {
        $val = trim(strip_tags($this->data['hoten']));

        if (empty($val)) {
            $this->addError('fullname', 'fullname can not empty!');
        } else {
            $regex = "[a-zA-Z]{0,31}\D$";
            if (!preg_match("/$regex/", $val)) {
                $this->addError('fullname', 'fullname only letters and whitespace allowed!');
            }
        }
    }

    public function validateEmail()
    {
        $val = trim(strip_tags($this->data['email']));

        if (empty($val)) {
            $this->addError('email', 'email can not empty');
        } else {
            $regex = "^[a-z][a-z0-9]{0,31}\@gmail.com$";
            if (!preg_match("/$regex/", $val)) {
                $this->addError('email', 'email do not match format(ex: abc@gmail.com)');
            }
        }
    }

    public function validateAddress()
    {
        $val = trim(strip_tags($this->data['diachi']));

        if (empty($val)) {
            $this->addError('address', 'address can not empty');
        }
    }

    public function validateMobilenumber()
    {
        $val = trim(strip_tags($this->data['dienthoai']));

        if (empty($val)) {
            $this->addError('mobileNumber', 'mobileNumber can not empty');
        } else {
            $regex = "^0[0-9]{1,11}$";
            if (!preg_match("/$regex/", $val)) {
                $this->addError('mobileNumber', 'mobileNumber start 0 number and max 11 numbers(ex:0123456789 or 01234567891)');
            }
        }
    }

    private function addError($key, $mes)
    {
        $this->errors[$key] = $mes;
    }
}
