import { Component } from '@angular/core';
import { BackendApiService } from "./services/backend-api.service";
export interface uSUARIO {
  idusuario: number;
  usuario: string;
  contraseña: string;
}
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'sistema';
}
