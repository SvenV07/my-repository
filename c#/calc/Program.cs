Console.WriteLine("+, -, * or /");
char operation = Console.ReadLine()[0];

Console.WriteLine("first nubmer?");
float getal1 = float.Parse(Console.ReadLine());

Console.WriteLine("second number?");
float getal2 = float.Parse(Console.ReadLine());

float resultaat = 0;

if (operation == '+')
{
    resultaat = getal1 + getal2;
}
else if (operation == '-')
{
    resultaat = getal1 - getal2;
}
else if (operation == '*')
{
    resultaat = getal1 * getal2;
}
else if (operation == '/')
{
    if (getal2 != 0)
    {
        resultaat = getal1 / getal2;
    }
    else
    {
        Console.WriteLine("Can't devide by 0");
    }
}
else
{
    Console.WriteLine("use one of the above mentioned operators");
}

Console.WriteLine("result:" + resultaat);
