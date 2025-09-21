<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorRequest extends Controller
{
    public function validateSettings(Request $request)
    {
        $errors = [];
        
        // Name validation: 5-30 alphabets only
        if ($request->has('name')) {
            $name = $request->input('name');
            if (empty($name)) {
                $errors['name'] = 'Name is required';
            } elseif (!preg_match('/^[a-zA-Z\s]{5,30}$/', $name)) {
                $errors['name'] = 'Name must be 5-30 alphabets only';
            }
        }
        
        // Specialization validation: 8-100 alphabets
        if ($request->has('specialization')) {
            $specialization = $request->input('specialization');
            if (empty($specialization)) {
                $errors['specialization'] = 'Specialization is required';
            } elseif (!preg_match('/^[a-zA-Z\s]{8,100}$/', $specialization)) {
                $errors['specialization'] = 'Specialization must be 8-100 alphabets';
            }
        }
        
        // Email validation: standard email format
        if ($request->has('email')) {
            $email = $request->input('email');
            if (empty($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Please enter a valid email address';
            }
        }
        
        // Address validation: 10-100 characters
        if ($request->has('address')) {
            $address = $request->input('address');
            if (empty($address)) {
                $errors['address'] = 'Address is required';
            } elseif (strlen($address) < 10 || strlen($address) > 100) {
                $errors['address'] = 'Address must be 10-100 characters';
            }
        }
        
        // Mobile validation: numeric and 13 digits starting with +880
        if ($request->has('mobile')) {
            $mobile = $request->input('mobile');
            if (empty($mobile)) {
                $errors['mobile'] = 'Mobile number is required';
            } elseif (!preg_match('/^\+880[0-9]{10}$/', $mobile)) {
                $errors['mobile'] = 'Mobile must be 13 digits starting with +880';
            }
        }
        
        return $errors;
    }
    
    public function validateHealthTips(Request $request)
    {
        $errors = [];
        
        if ($request->has('description')) {
            $description = trim($request->input('description'));
            $wordCount = count(preg_split('/\s+/', $description, -1, PREG_SPLIT_NO_EMPTY));
            
            if (empty($description)) {
                $errors['description'] = 'Health tips description is required';
            } elseif ($wordCount < 20) {
                $errors['description'] = 'Health tips must be at least 20 words';
            } elseif ($wordCount > 250) {
                $errors['description'] = 'Health tips must not exceed 250 words';
            }
        }
        
        return $errors;
    }
    
    public function getErrorMessage($errors)
    {
        if (empty($errors)) {
            return null;
        }
        
        if (count($errors) === 1) {
            return reset($errors);
        }
        
        return 'Please enter valid information';
    }
}