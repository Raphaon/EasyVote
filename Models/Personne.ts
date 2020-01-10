export class Personne
{
    private name;
    private surname;
    private birthDay;
    private sexe;
    private refference;
    private size;
    private heigth;

    getName(){return this.name; }
    getSurname(){return this.surname ;}
    getBirthDay(){return this.birthDay ;}
    getSexe(){return this.sexe; }
    getRefference(){return this.refference ;}
    getSize(){return this.size;}
    getHeight(){return this.heigth; }

    /***
     * Ecriture des getters et des setters pour changer les valeurs de vaariables 
     */
    setName(newName){this.name = this.name ; }
    setSurname(newSurname){this.surname = newSurname ;}
    setDatebirth(newbirthDay){this.birthDay = newbirthDay;}
    setSexe(newSexe){this.sexe=newSexe;}
    setSize(newSize){this.size = newSize; }
    setHeight(newHeight){this.heigth = newHeight;}
    setReffence(newReff){this.refference = newReff;}


    



}