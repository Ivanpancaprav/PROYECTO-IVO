import { Injectable } from '@angular/core';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http';
const HttpOptions = {
  headers: new HttpHeaders({
    'Content-Type':'application/json'
  })
}

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
  [x: string]: any;
  public url: string;

  constructor(private Http: HttpClient) {
    this.url ="http://localhost/api/pacientes";
   }

   getPacientes(){
      return this.Http.get(this.url);
   }
}
