<?php

namespace Database\Seeders;

use App\Models\Employee;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Employee::create([
            "name" => "WANDA MAXIMOFF",
            "div" => "SALES",
            "branch" => "SUB"
        ]);
        //2
        Employee::create([
            "name" => "NATALIA ALIANOVNA ROMANOVA",
            "div" => "IT",
            "branch" => "SUB"
        ]);
        //3
        Employee::create([
            "name" => "BARBARA 'BOBBI' MORSE",
            "div" => "SALES",
            "branch" => "SUB"
        ]);
        //4
        Employee::create([
            "name" => "NAMORITA 'NITA' PRENTISS",
            "div" => "COMMERCIAL",
            "branch" => "SUB"
        ]);
        //5
        Employee::create([
            "name" => "JOHN JONAH JAMESON",
            "div" => "COMMERCIAL",
            "branch" => "SUB"
        ]);
        //6
        Employee::create([
            "name" => "JANET VAN DYNE",
            "div" => "KEY ACCOUNT",
            "branch" => "SUB"
        ]);
        //7
        Employee::create([
            "name" => "STEPHEN VINCENT STRANGE",
            "div" => "KEY ACCOUNT",
            "branch" => "SUB"
        ]);
        //8
        Employee::create([
            "name" => "ELEKTRA NATCHIOS",
            "div" => "HSE",
            "branch" => "SUB"
        ]);
        //9
        Employee::create([
            "name" => "CAMELLIA",
            "div" => "OPERATION",
            "branch" => "SUB"
        ]);
        //10
        Employee::create([
            "name" => "CATHRINE MORA",
            "div" => "KEY ACCOUNT",
            "branch" => "SUB"
        ]);
        //11
        Employee::create([
            "name" => "MATT MURDOCK",
            "div" => "HSE",
            "branch" => "SUB"
        ]);
        //12
        Employee::create([
            "name" => "DEREK MORGAN",
            "div" => "CR",
            "branch" => "SUB"
        ]);
        //13
        Employee::create([
            "name" => "ELLIE CAMACHO",
            "div" => "OPERATION",
            "branch" => "JKT"
        ]);
        //14
        Employee::create([
            "name" => "FIN CASEY",
            "div" => "KEY ACCOUNT",
            "branch" => "SUB"
        ]);
        //15
        Employee::create([
            "name" => "GAMORA",
            "div" => "OPERATION",
            "branch" => "SUB"
        ]);
        //16
        Employee::create([
            "name" => "CLINT BARTON",
            "div" => "TRUCKING",
            "branch" => "SUB"
        ]);
        //17
        Employee::create([
            "name" => "PATSY WALKER",
            "div" => "CR",
            "branch" => "JKT"
        ]);
        //18
        Employee::create([
            "name" => "ROBERT BRUCE BANNER",
            "div" => "CR",
            "branch" => "SUB"
        ]);
        //19
        Employee::create([
            "name" => "CAIN MARKO",
            "div" => "HR&GA",
            "branch" => "SUB"
        ]);
        //20
        Employee::create([
            "name" => "JEAN GREY",
            "div" => "PROCUREMENT",
            "branch" => "SUB"
        ]);
        //21
        Employee::create([
            "name" => "MILES BULLOCK",
            "div" => "HR&GA",
            "branch" => "SUB"
        ]);
        //22
        Employee::create([
            "name" => "JAMES MADROX",
            "div" => "IT",
            "branch" => "SUB"
        ]);
    }
}
