<?php

namespace App\Validator;

use App\Constraint\AuthConstraint;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AuthConstraintValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof AuthConstraint) {
            throw new UnexpectedTypeException($constraint, AuthConstraint::class);
        }

        if (!$value['email'] === null) {
            return;
        }
        dump($value);


//        // custom constraints should ignore null and empty values to allow
//        // other constraints (NotBlank, NotNull, etc.) to take care of that
//        if (null === $value || '' === $value) {
//            return;
//        }
//
//        if (!is_string($value)) {
//            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
//            throw new UnexpectedValueException($value, 'string');
//
//            // separate multiple types using pipes
//            // throw new UnexpectedValueException($value, 'string|int');
//        }
//
//        // access your configuration options like this:
//        if ('strict' === $constraint->mode) {
//            // ...
//        }
//
//        if (!preg_match('/^[a-zA-Z0-9]+$/', $value, $matches)) {
//            // the argument must be a string or an object implementing __toString()
//            $this->context->buildViolation($constraint->message)
//                ->setParameter('{{ string }}', $value)
//                ->addViolation();
//        }

        return false;
    }
}