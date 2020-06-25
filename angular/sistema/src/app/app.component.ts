import { Component } from '@angular/core';
import { BackendApiService } from "./services/backend-api.service";
export interface Usuario {
  idusuario: number;
  usuario: string;
  contrasena: string;
}
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'sistema';
  public Usuarios:Usuario[]=[];
  constructor(
    private api: BackendApiService,
  ) {
    this.api.getData("lista")
    .subscribe(
      response => {
        this.Usuarios=response.lista;
      },
      err => {
        console.log(err);
      }
    );
  }
}
