using System;

namespace intro
{
    class Program
    {
        private string _Version;

        public string Version { get; protected set; }

        private string name;

        public string Name 
        {
            get { return name.ToUpper(); }
            protected set 
            { 
                if(!String.IsNullOrEmpty(value)) {
                    name = value; 
                }
            }
        }

        public string GetName()
        {
            return this.name;
        }

        static void Main(string[] args)
        {
            Program p = new Program() { Name = "lol" };

            p.GetName();
            string variable = p.Name;
            p.Name = "lol";

            Console.WriteLine("Hello World!");
        }
    }
}
