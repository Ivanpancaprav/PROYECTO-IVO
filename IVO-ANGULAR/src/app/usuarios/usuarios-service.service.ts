import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Citas } from '../models/cita.model';
import { Medicamentos } from '../models/medicamentos.model';
import { Informes } from '../models/informes.model';
import { historias_clinicas } from '../models/historias_clinicas.model';
import { Observable } from 'rxjs';
import { Medico } from '../models/medico.model';

const baseUrl = 'http://localhost/api/';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-type':'applications/json'
  })
}

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
  [x: string]: any;

  constructor(private Http: HttpClient) { }

  getPacientes(): Observable<Paciente[]> {
    
    return this.Http.get<Paciente[]>(baseUrl + 'pacientes');
  }

  getMedicos(): Observable<Medico[]>{

      return this.Http.get<Medico[]>(baseUrl + 'medicos');
  }

  getPerfil(dni: string): Observable<Paciente> {
    return this.Http.get(baseUrl + 'perfil/' + dni);
  }

  getInforme(id: number): Observable<any> {
    return this.Http.get(baseUrl + 'informe/' + id);
  }

  getMedicamentos() :Observable<Medicamentos[]>{
    return this.Http.get<Medicamentos[]>(baseUrl + 'medicamentos');
  }

  getInformes() {
    return this.Http.get<Informes[]>(baseUrl + 'informes');
  }

  getHistorias_clinicas() {
    return this.Http.get<historias_clinicas[]>(baseUrl + 'historiasclinicas');
  }

<<<<<<< HEAD
<<<<<<< HEAD
  borrarHistorias_clinicas() {
    return this.Http.delete<historias_clinicas[]>(baseUrl + 'historiasclinicas');
=======

=======
>>>>>>> d91ef8d6b3e0883dc8558c4f8d34d2d4107e7eba
  crearCita(cita: Citas): Observable<any>{
    return this.Http.post(baseUrl +'crea_cita',cita,httpOptions);
  }

  getCitas(tipo: number,dni: string,role: string): Observable<Citas[]> {
    if (tipo == 0) {
      return this.Http.get<Citas[]>(baseUrl + 'citas/'+dni+'/'+role);
    } else { return this.Http.get<Citas[]>(baseUrl + 'citasprev/'+dni+'/'+role); }
  }

  getCita(id_cita: number): Observable<any>{
      return this.Http.get<any>(baseUrl+'verCita/'+id_cita);
  }

  citaUpdate(id_cita: number, cita: Citas): Observable<any>{
      return this.Http.put(baseUrl +'citaUpdate/'+id_cita,cita,httpOptions);
  }

  citaDelete(id_cita: number){
    return this.Http.delete(baseUrl+'borraCita/'+id_cita);
>>>>>>> b270c0f2823762118ee306cfd07950818b48a026
  }

}
