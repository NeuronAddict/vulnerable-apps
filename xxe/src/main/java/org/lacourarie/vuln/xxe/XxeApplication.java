package org.lacourarie.vuln.xxe;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.http.converter.xml.Jaxb2RootElementHttpMessageConverter;

@SpringBootApplication
public class XxeApplication {

    public static void main(String[] args) {
        SpringApplication.run(XxeApplication.class, args);
    }

    @Bean
    public Jaxb2RootElementHttpMessageConverter jaxb2RootElementHttpMessageConverter() {
        Jaxb2RootElementHttpMessageConverter converter = new Jaxb2RootElementHttpMessageConverter();
        converter.setSupportDtd(true);
        converter.setProcessExternalEntities(false);
        return converter;
    }
}
