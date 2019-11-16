package org.lacourarie.vuln.xxe;

import javax.xml.bind.JAXBContext;
import javax.xml.bind.JAXBException;
import javax.xml.bind.Marshaller;

public class Generate {

    public static void main(String[] args) throws JAXBException {
        JAXBContext jc = JAXBContext.newInstance(Message.class);

        Marshaller marshaller = jc.createMarshaller();
        marshaller.marshal(new Message("coucou"), System.out);
    }

}
