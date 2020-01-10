import { Electeur } from "./Electeur";

export class BureauVote 
{
    private name:string;
    private commune:string;
    private code:string ;
    getCommune(){return this.commune;}
    getCode(){return this.code;}
    getName(){return this.name;}
    
    setCode(newCode){this.code = newCode;}
    setName(newName){this.name = newName;}
    setCommune(newCommune){this.commune = newCommune}

    getElecteur(){}
    addElecteur(elect:Electeur){}
    removeElecteur(){}


}