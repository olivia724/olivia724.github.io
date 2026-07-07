/*##################################################################################
#
# Programmname: Rabatt_Kundentyp_2.cpp
# Beschreibung: Der Benutzer kann einen Betrag eingeben.
#				Das Programm berechnet den Bruttopreis nach einer Rabattsberechnung.
#				Rabatt gibt es je nach Kundentyp ab einem Betrag von 1000.-
#				Kundentyp A erhält bei einem Betrag über 1000.- einen Rabatt von 5%.
#				Kundentyp B erhält bei einem Betrag über 1000.- einen Rabatt von 3%.
#				Kundentyp C erhält keinen Rabatt.
#
# Version:      2.0
# Erstellt am:  03.05.2021
# Autor:        Husin Olivia
# Copyright:    Husin Olivia
#
# Aenderungen:	Am 03.05.2021 -> do-while eingebaut für eine erneute Abfrage
#				Am 07.07.2026 -> Eingabevalidierung fuer Betrag ergaenzt (nur Zahlen),
#				                 Fehlermeldung bei ungueltigem Kundentyp ergaenzt,
#				                 Bug in der while-Bedingung behoben ('j' || 'J')
#
####################################################################################*/
#include <iostream>
#include <limits>
using namespace std;

int main()
{
	char eingabe;
	do {
	    double betrag;
	    char kundentyp;
	    
	    cout << "Eingabe des Rechnungsbetrags: ";
	    while (!(cin >> betrag))
	    {
	        cout << "Ungueltige Eingabe. Bitte nur Zahlen eingeben: ";
	        cin.clear();
	        cin.ignore(numeric_limits<streamsize>::max(), '\n');
	    }
	
	    cout << "Kundentyp eingeben (A/B/C): ";
	    cin >> kundentyp;
	
	    if (betrag >= 1000)
		{
			if (kundentyp == 'A' || kundentyp == 'a')
	    	{
	        	cout << "Total: CHF " << betrag * 0.95;
			}
			else if (kundentyp == 'B' || kundentyp == 'b')
	    	{
	        	cout << "Total: CHF " << betrag * 0.97;
			}
			else if (kundentyp == 'C' || kundentyp == 'c')
	    	{
	        	cout << "Total: CHF " << betrag;
			}
			else
			{
				cout << "Ungueltiger Kundentyp. Bitte A, B oder C eingeben.";
			}
		}
			else
				{
					cout << "Total: CHF " << betrag;
				}
				
		cout << "\nNochmal berechnen?\n" << "Druecke die Taste 'j' und Enter.\n";
	    cin >> eingabe;
	}
    while(eingabe == 'j' || eingabe == 'J');
    return 0;
}
