/*#######################################################################################################################
#
# Programmname: Schaltjahr.cpp
# Beschreibung: Der Benutzer kann eine vierstellige Jahreszahl eingeben.
#				Das Programm wertet die Eingabe aus und zeigt an, ob die eingegebene Zahl ein Schaltjahr ist oder nicht.
#
# Version:      2.0
# Erstellt am:  03.05.2021
# Autor:        Olivia Husin
# Copyright:    Olivia Husin
#
# Aenderungen:	Am 03.05.2021 -> do-while eingebaut für eine erneute Abfrage
#				Am 07.07.2026 -> Eingabevalidierung ergaenzt (nur Zahlen erlaubt),
#				                 Bug in der while-Bedingung behoben ('j' || 'J')
#
#########################################################################################################################*/
#include <iostream>
#include <limits>
using namespace std;

int main()
{
	char eingabe;
	
	do
	{
	    string anzeige = "ist kein Schaltjahr";	
	    int jahreszahl;
	    
	    
	    cout << "Geben Sie eine vierstellige Jahreszahl ein: " ;
	    while (!(cin >> jahreszahl))
	    {
	        cout << "Ungueltige Eingabe. Bitte nur Zahlen eingeben: ";
	        cin.clear();
	        cin.ignore(numeric_limits<streamsize>::max(), '\n');
	    }
	
	    if(jahreszahl % 4 == 0)
	    {
	        anzeige = "ist ein Schaltjahr";
			if (jahreszahl % 100 == 0)
			{
				anzeige = "ist kein Schaltjahr";
				if (jahreszahl % 400 == 0)
				{
					anzeige = "ist ein Schaltjahr";
				}
			}
	    }
	
		cout << jahreszahl << ' '  << anzeige;
	    
	    cout << "\nNochmal berechnen?\n" << "Druecke die Taste 'j' und Enter.\n";
	    cin >> eingabe;
	    
	}
	while(eingabe == 'j' || eingabe == 'J');

}
