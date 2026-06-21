admin: admin/admin

# Projektni zadatak za kolegij Programiranje web aplikacija

## Napravljena jednostavna web aplikacija koja radi kao jednostavni CMS za vijesti.
Vijest se može:
- Čitati
- Pregledavati po kategorijama
- Dodavati
- Mijenjati
- Brisati

Jednostavan ACL:
- Admin korisnik koji može mijenjati/brisati vijesti
- Običan korisnik koji trenutno ništa ne može

## Login za aplikaciju
Admin: admin/admin<br>
Običan korisnik: user/user

## Setup
Potrebno je preuzeti cijeli repozitoriji kao zip i prebaciti ga u XAMPP htdocs folder. U XAMPP-u treba upaliti Apache i MySQL.
Potrebno je otvoriti PhpMyAdmin da se doda baza `projektni_ebraun.sql` koja sadrži **i bazu i popunjene tablice**. Ne treba ručno kreirati bazu!

![PhpMyAdmin setup](https://github.com/erikthegamer1242/PWA-Projektni/blob/main/readme_img/info.png?raw=true)
Ovako se treba otiči na import. Umjesto db kod mene može pisati localhost, 127.0.0.1 i sl...

Ako je vaš setup za MySQL drukčiji od defaultnog, treba promijentiti postavke u `env.php`.